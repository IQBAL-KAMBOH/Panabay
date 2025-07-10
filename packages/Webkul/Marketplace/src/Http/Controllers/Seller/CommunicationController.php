<?php

namespace Webkul\Marketplace\Http\Controllers\Seller;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Webkul\Marketplace\Enums\SenderType;
use Webkul\Marketplace\Http\Resources\Communication\CommunicationMessageResource;
use Webkul\Marketplace\Repositories\CommunicationRepository;

class CommunicationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected CommunicationRepository $communicationRepository) {}

    /**
     * Method to load the index page for the seller communication.
     */
    public function index(): JsonResource|View
    {
        $communication = $this->communicationRepository->findOneWhere([
            'marketplace_seller_id' => seller()->id(),
        ]);

        if ($communication) {
            $communication->messages()
                ->where('sender_type', SenderType::ADMIN->value)
                ->update(['is_read' => 1]);

            $communication = $communication->refresh();
        }

        return view('marketplace::seller.communication.index')
            ->with([
                'isBlocked' => $communication?->is_blocked,
                'messages'  => CommunicationMessageResource::collection($communication->messages ?? []),
            ]);
    }

    /**
     * Method to store the communication.
     */
    public function sendMessage(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'message'    => ['nullable', 'string', 'max:255', 'required_without:attachment'],
            'attachment' => ['nullable', 'mimes:jpeg,jpg,png,pdf,doc,docx', 'required_without:message'],
        ]);

        try {
            $result = $this->communicationRepository->updateOrCreateCommunication(
                $validated,
                seller()->id(),
                SenderType::SELLER->value
            );

            return new JsonResponse([
                'message'     => trans('marketplace::app.seller.communication.index.message-sent'),
                'new_message' => new CommunicationMessageResource($result['messages']),
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return new JsonResponse([
                'message' => trans('marketplace::app.seller.communication.index.message-failed'),
            ], 500);
        }
    }

    /**
     * Method to get the communication history.
     */
    public function messages(Request $request): JsonResponse
    {
        $params = [
            'seller_id' => seller()->id(),
            'days'      => $request->input('days'),
        ];

        $messages = $this->communicationRepository->getMessages($params);

        return new JsonResponse([
            'messages' => CommunicationMessageResource::collection($messages),
        ], 200);
    }
}

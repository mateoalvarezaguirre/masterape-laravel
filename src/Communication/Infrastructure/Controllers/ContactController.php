<?php

namespace Src\Communication\Infrastructure\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Src\Communication\Infrastructure\Requests\SaveContactRequest;

class ContactController
{
    public function send(SaveContactRequest $request): RedirectResponse
    {
        Log::info('contact', $request->toArray());

        return redirect(url()->previous() . '#contact-success')->with('status', 'message-sent');
    }
}

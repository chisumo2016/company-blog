<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentReplyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'comment_id' => 'required|integer|exists:comments,id',
            'body'       => 'required|string|max:1000',
        ];
    }

    public function replyData($user)
    {
        return [
            'comment_id' => $this->comment_id,
            'author'     => $user->name,
            'email'      => $user->email,
            'body'       => $this->body,
        ];
    }
}

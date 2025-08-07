<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Validator;
use Framework\Rules\{
    RequiredRule,
    EmailRule,
    MaxLengthRule,
    MatchRule,
    InRule,
    UrlRule
};
use Framework\Rules\File\{
    UploadedRule,
    SizeRule,
    NameRule,
    MimeRule
};

class ValidatorService
{
    private Validator $validator;

    public function __construct()
    {
        $this->validator = new Validator();

        $this->validator->add('required', new RequiredRule());
        $this->validator->add('email', new EmailRule());
        $this->validator->add('max', new MaxLengthRule());
        $this->validator->add('match', new MatchRule());
        $this->validator->add('in', new InRule());
        $this->validator->add('url', new UrlRule());
        $this->validator->add('fileUploaded', new UploadedRule());
        $this->validator->add('fileSize', new SizeRule());
        $this->validator->add('fileName', new NameRule());
        $this->validator->add('fileMime', new MimeRule());
    }

    public function validateRegister(array $formData): void
    {
        $this->validator->validate($formData, [
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', 'max:64'],
            'confirmPassword' => ['required', 'match:password']
        ]);
    }

    public function validateLogin(array $formData): void
    {
        $this->validator->validate($formData, [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
    }

    public function validatePosting(array $formData): void
    {
        $this->validator->validate($formData, [
            'logo' => ['fileUploaded', 'fileSize:1024', 'fileName', 'fileMime:image/jpeg,image/png'],
            'company' => ['required'],
            'position' => ['required'],
            'contract' => ['required', 'in:Full Time,Part Time,Internship'],
            'location' => ['required'],
            'website' => ['required', 'url'],
            'description' => ['required', 'max:2000'],
            'requirements' => ['required', 'max:1500'],
            'role' => ['required', 'max:1500']
        ]);
    }

    public function validateUpdatePosting(array $formData): void
    {
        $this->validator->validate($formData, [
            'company' => ['required'],
            'position' => ['required'],
            'contract' => ['required', 'in:Full Time,Part Time,Internship'],
            'location' => ['required'],
            'website' => ['required', 'url'],
            'description' => ['required', 'max:2000'],
            'requirements' => ['required', 'max:1500'],
            'role' => ['required', 'max:1500']
        ]);
    }
}

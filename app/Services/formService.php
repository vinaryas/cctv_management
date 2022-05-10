<?php

namespace App\Services;

use App\Models\form;

class formService
{
   private $form;

   public function __construct(form $form)
    {
        $this->form = $form;
    }

   public function all()
	{
		return $this->form->query();
	}

    public function store($data)
    {
        return $this->form->create($data);
    }

}

<?php

namespace App\Services;


use App\Models\form_place;

class form_placeService
{
   private $form_place;

   public function __construct(form_place $form_place)
    {
        $this->form_place = $form_place;
    }

   public function all()
	{
		return $this->form_place->query();
	}

    public function store($data)
    {
        return $this->form_place->create($data);
    }

}

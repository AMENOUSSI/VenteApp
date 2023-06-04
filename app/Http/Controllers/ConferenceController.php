<?php

namespace App\Http\Controllers;

use App\Http\Resources\ConferenceCollection;
use App\Models\Conference;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function index()
    {
        return new ConferenceCollection(Conference::all());
    }
}


<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateConferenceRequest;
use App\Http\Requests\EditConferenceRequest;
use App\Models\Conference;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $query = Conference::query();
            $perPage = 1;
            $page = $request->input('page', 1);
            $search = $request->input('search');
            if ($search) {
                $query->whereRaw('name', 'LIKE', '%' . $search . '%');
            }
            $total = $query->count();

            $result = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();



            return response()->json([
                'status_code' => 200,
                'status_message' => 'Les conference ont été récupérée.',
                'current_page' => $page,
                'last_page' => ceil($total / $perPage),
                'items' => $result
                //'data' => Conference::all(),
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'status_message' => 'Une erreur est survenue',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateConferenceRequest $request)
    {

        try {
            $conference = new Conference();
            $conference->name = $request->name;
            $conference->sigle = $request->sigle;
            $conference->theme = $request->theme;
            $conference->date_soumission = $request->date_soumission;
            $conference->date_remise_resultats = $request->date_remise_resultats;
            $conference->date_inscription = $request->date_inscription;
            $conference->date_deroulement = $request->date_deroulement;
            $conference->save();

            return response()->json([
                'status_code' => 201,
                'status_message' => 'La conference a été ajoutée',
                'data' => $conference
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditConferenceRequest $request, Conference $conference)
    {
        try {

            //$conference = Conference::find($id);
            $conference->name = $request->name;
            $conference->sigle = $request->sigle;
            $conference->theme = $request->theme;
            $conference->date_soumission = $request->date_soumission;
            $conference->date_remise_resultats = $request->date_remise_resultats;
            $conference->date_inscription = $request->date_inscription;
            $conference->date_deroulement = $request->date_deroulement;

            $conference->save();

            return response()->json([
                'status_code' => 201,
                'status_message' => 'La conference a été modifiée',
                'data' => $conference
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conference $conference)
    {
        try {
            $conference->delete();
            return response()->json([
                'status_code' => 204,
                'status_message' => 'La conference a été supprimée'
            ]);
        } catch (Exception $e) {

        } catch (Exception $e) {
            return response()->json($e);
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\Domains\Searches\Request\SearchRequest;
use App\Domains\Searches\Search;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected static $base_uri = 'https://bigboost.bigdatacorp.com.br/peoplev2?Datasets=basic_data,emails,phones&AccessToken=61d50b1c-0e2c-4ae3-a658-32d10996a579';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchRequest $request)
    {
        if (!is_null($request->name) || !is_null($request->cpf)) {
            $search = '&q=';

            if (!is_null($request->name)){
                $search .= 'name{'.$request->name.'}';
            }

            if (!is_null($request->cpf)){
                $search .= ',doc{'.$request->cpf.'}';
            }

            $url = self::$base_uri.$search;

            $client = new Client();
            $result = $client->get($url);
            $response = $result->getBody()->getContents();

            $users = json_decode($response);

            foreach ($users->Result as $user) {
                $usersSave = [
                    'name' => $user->BasicData->Name,
                    'cpf' => $user->BasicData->TaxIdNumber
                ];
                Search::create($usersSave);
            }


            return view('search.index', compact('users'));
        }

        return view('search.index');

    }

    public function history()
    {
        $searches = Search::paginate();

        return view('search.history', compact('searches'));
    }

}

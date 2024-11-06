<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $routes = $user->routes();
        return view('route.index', ['routes' => $routes]);
    }
    public function store(Request $request)
    {
        $user = auth()->user();
        $validate = $request->validate([
            'url' => 'required|url',
        ], [
            'required' => 'O campo :attribute é obrigatório',
            'url' => 'O campo :attribute deve ser uma URL válida',
        ]);
        $slug = substr(md5(uniqid()), 0, 6);
        $route = Route::create([
            'user_id' => $user->id,
            'url' => $validate['url'],
            'slug' => $slug,
        ]);
        if (!$route) {
            return redirect()->back()->with('error', 'Erro ao encurtar a URL');
        }
        return redirect()->route('index')->with('success', 'Link encurtado com sucesso!');
    }
    public function destroy(int $id)
    {
        $user = auth()->user();
        $route = Route::where('id', $id)->where('user_id', $user->id)->first();
        if (!$route) {
            return redirect()->back()->with('error', 'URL não encontrada');
        }
        $route->delete();
        return redirect()->route('index')->with('success', 'URL deletada com sucesso');
    }
    public function redirect($slug)
    {
        $route = Route::where('slug', $slug)->first();
        if (!$route) {
            return 'URL não encontrada';
        }
        $report = Report::where('route_id', $route->id)->where('date', date('Y-m-d'))->first();
        if (!$report) {
            Report::create([
                'route_id' => $route->id,
                'date' => date('Y-m-d'),
                'clicks' => 1,
            ]);
        } else {
            $report->clicks++;
            $report->save();
        }
        return redirect($route->url);
    }
}

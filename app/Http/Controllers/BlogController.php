<?php

namespace App\Http\Controllers;

use App\Events\UserCreateBlogEvent;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Facades\JWTAuth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Blog::all();

            return BlogResource::collection($data);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Internal Error!',
                'log' => $e->getMessage()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function meBlogs()
    {
        try {
            $user_id = JWTAuth::parseToken()->getPayload()->get('user_id');
            $data = Blog::query()
                ->where('user_id', $user_id)
                ->orderBy('release_date')
                ->get();

            return BlogResource::collection($data);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Internal Error!',
                'log' => $e->getMessage()
            ], 500);
        }
    }
    public function filter()
    {
        try {
           //
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Internal Error!',
                'log' => $e->getMessage()
            ], 500);
        }
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        try {
            $request_data = $request->only([
                'category_id',
                'title',
                'img',
                'description',
            ]);
            $request_data['user_id'] = auth('api')->user()->id;
            $request_data['release_date'] = Carbon::parse(now())->format('Y-m-d');
            $data = new Blog($request_data);
            $data->save();
            $user = auth('api')->user();
            event(new UserCreateBlogEvent($user, $data));

            return BlogResource::make($data);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Internal Error!',
                'log' => $e->getMessage()
            ], 500);
        }
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function show(Blog $id)
    {
        try {
            $data = Blog::findOrFail($id);

            return BlogResource::make($data);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Internal Error!',
                'log' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, $id)
    {
        try {
            $data = Blog::findOrFail($id);
            $request_data = $request->only([
                'category_id',
                'title',
                'description',
            ]);
            $data->update($request_data);

            return BlogResource::make($data);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Internal Error!',
                'log' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $data = Blog::findOrFail($id);
            $data->delete();

            return response()->json([
                'status'=>true,
                'message'=>'Blog Successfully Is Deleted!'
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Internal Error!',
                'log' => $e->getMessage()
            ], 500);
        }
    }
}

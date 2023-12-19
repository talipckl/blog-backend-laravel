<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogCategoryRequest;
use App\Http\Requests\UpdateBlogCategoryRequest;
use App\Http\Resources\BlogCategoryResource;
use App\Models\BlogCategory;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class BlogCategoryController extends Controller
{
    public function index()
    {
        try {
            $data = BlogCategory::all();

            return  BlogCategoryResource::collection($data);
        }catch (\Exception $e){
            Log::error($e->getMessage());

            return response()->json([
                'status'=>false,
                'message'=>'Internal Error!',
                'log'=>$e->getMessage()
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogCategoryRequest $request)
    {
        try {
           //
        }catch (\Exception $e){
            Log::error($e->getMessage());

            return response()->json([
                'status'=>false,
                'message'=>'Internal Error!',
                'log'=>$e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogCategoryRequest $request, BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategory $blogCategory)
    {
        //
    }
}

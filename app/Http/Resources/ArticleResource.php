<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        $date=toNepaliDate($this->created_at->format('Y-m-d'));


        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'slug'=>$this->slug,
            'status'=>$this->status,
            'image'=>asset(Storage::url($this->image) ),
            'description'=>$this->description,
            'author_name'=>$this->author_name,
            'published_at'=>$date,
             'meta_title'=> $this->meta_title,
            'meta_keywords'=> $this->meta_keywords,
           'meta_description'=> $this->meta_description,

        ];
    }
}

<?php

namespace App;

use Spatie\Tags\HasTags;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Post extends Model implements Feedable
{
    use HasSlug, HasTags;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'text', 'published_at'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['published_at'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['author'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('published', function (Builder $builder) {
            if (auth()->guest()) {
                $builder->where('published_at', '<=', now());
            }
        });
    }

    /**
     * A post belongs to an author.
     *
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * A post has many tags.
     *
     */
    public function tags(): MorphToMany
    {
        return $this
            ->morphToMany(self::getTagClassName(), 'taggable', 'taggables', null, 'tag_id')
            ->orderBy('order_column');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public static function getTagClassName(): string
    {
        return Tag::class;
    }

    public function toFeedItem()
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($this->summary)
            ->updated($this->published_at)
            ->link(route('posts.show', $this))
            ->author($this->author->name);
    }

    public static function getFeedItems()
    {
        return Post::all();
    }

    public function getMinutesToReadAttribute()
    {
        $wordsPerMinute = 200;

        $wordCount = str_word_count(strip_tags($this->text));

        return ceil($wordCount / $wordsPerMinute);
    }

    public function getIsPublishedAttribute()
    {
        return $this->published_at->isPast();
    }

    public function getSummaryAttribute()
    {
        return str_limit(strip_tags($this->text), 250);
    }

    public function scopeOrderByPublicationDate(Builder $query)
    {
        return $query->orderBy('published_at', 'desc');
    }
}

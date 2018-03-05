<?php


namespace Dokohler\Imgplay;


use Illuminate\Support\Collection;

class Player {

    protected $name;
    protected $images;
    protected $options;


    public function __construct($name = NULL, $images = NULL, $options = NULL)
    {
        $this->name = $name ?? 'imgplayer';
        $this->images = collect($images ?? []);
        $this->options = collect($options ?? []);
    }


    public function setImages(Collection $images)
    {
        $this->images = $images;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function pushImage($image)
    {
        $this->images = $this->images->push($image);
    }


    public function getContainer()
    {
        $name = $this->name;
        $images = $this->images;

        $container = "<div id='$name' class='imageplayer'>";

        foreach($images as $key => $image) {
            $container .= "<img src='$image' style='display: none;'>";
        }

        $container .= "</div>";

        return $container;
    }


    public function getScript()
    {
        $name = $this->name;
        $options = $this->options->toJson();

        return "$('#$name').imgplay($options);";
    }

    public function getAction($method, string $attributes = '')
    {
        return "$('#$this->name').data('imgplay').$method($attributes);";
    }

}
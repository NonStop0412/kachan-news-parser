<?php
namespace App;

use Illuminate\Support\Facades\Log;
use PicoFeed\Reader\Reader;
use PicoFeed\PicoFeedException;
use PicoFeed\Config\Config;
use App\Models\Source;


class Parsing
{
    private $link;

    public function __construct(string $link)
    {
        $this->link = $link;
    }

    private function configure()
    {
        $config = new Config;
        $config->setMaxBodySize(10485760);

        return $config;
    }

    public function getFeed()
    {
        $config = $this->configure();
        $reader = new Reader($config);

        try {
            // Return a resource
         $resource = $reader->download($this->link);

         // Return the right parser instance according to the feed format
            $parser = $reader->getParser(
                $resource->getUrl(),
                $resource->getContent(),
                $resource->getEncoding()
            );
        } catch (PicoFeedException $e) {
            Log::error($e->getMessage());
            $source = Source::where('url', $this->link)->first();
            $source->deactivate();

            return 0;
        }

        // Return a Feed object
        /** @var \PicoFeed\Parser\Feed $data */
        $data = $parser->execute();
        $feeds = [];
        /**
         * @var  $key
         * @var \PicoFeed\Parser\Item $value
         */
        foreach ($data->getItems() as $key => $value) {
            $feeds[$key] = [
                'title' => $value->getTitle(),
                'url' => $value->getUrl(),
                'published_date' => $value->getPublishedDate(),
                'image' => $value->getEnclosureUrl(),
                'source_id' => Source::getId($this->link)
            ];
        }

        return $feeds;
    }
}

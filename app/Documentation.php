<?php namespace App;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Cache\Repository as Cache;

class Documentation {

	/**
	 * The filesystem implementation.
	 *
	 * @var Filesystem
	 */
	protected $files;

	/**
	 * The cache implementation.
	 *
	 * @var Cache
	 */
	protected $cache;

	/**
	 * Create a new documentation instance.
	 *
	 * @param  Filesystem  $files
	 * @param  Cache  $cache
	 * @return void
	 */
	public function __construct(Filesystem $files, Cache $cache)
	{
		$this->files = $files;
		$this->cache = $cache;
	}

	/**
	 * Get the documentation index page.
	 *
	 * @param  string  $version
	 * @return string
	 */
	public function getIndex($version)
	{
		// return $this->cache->remember('docs.'.$version.'.index', 0, function() use ($version) {
			$path = base_path('resources/docs/'.$version.'/documentation.md');
			if ($this->files->exists($path)) {
				return markdown($this->files->get($path));
			}
			return null;
		// });
	}

	/**
	 * Get the given documentation page.
	 *
	 * @param  string  $version
	 * @param  string  $page
	 * @return string
	 */
	public function get($version, $page)
	{
		// return $this->cache->remember('docs.'.$version.'.'.$page, 0, function() use ($version, $page) {
			$path = base_path('resources/docs/'.$version.'/'.$page.'.md');
			if ($this->files->exists($path)) {
				return markdown($this->files->get($path));
			}
			return null;
		// });
	}

}

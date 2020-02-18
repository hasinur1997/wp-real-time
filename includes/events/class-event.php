<?php
class Event {
	/**
	 * Store pusher class instance
	 *
	 * @var \Pusher\Pusher
	 */
	private $pusher;

	/**
	 * Store Event data
	 * @var
	 */
	protected $data;

	/**
	 * Event constructor.
	 *
	 * @param $data
	 *
	 * @throws \Pusher\PusherException
	 */
    public function __construct( $data ) {
	    $options = array(
		    'cluster' => wp_rt_get_app_cluster(),
		    'useTLS' => true
	    );
	    $this->pusher = new Pusher\Pusher(
		    wp_rt_get_app_key(),
		    wp_rt_get_app_secret(),
		    wp_rt_get_app_id(),
		    $options
	    );

	    $this->pusher->trigger($this->channel(), $this->event(), $data);
    }

	/**
	 * Take the channel name from the user input
	 *
	 * @return string
	 */
	protected function channel() {
		return 'base-channel';
	}

	/**
	 * Take the event name from the user input
	 *
	 * @return string
	 */
	protected function event() {
		return 'base-event';
	}
}
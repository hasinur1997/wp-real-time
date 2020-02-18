<?php

/**
 * Class Post_Event
 */
class Post_Event extends Event {
	/**
	 * Get channel name
	 *
	 * @return string
	 */
    protected function channel() {
    	return 'post-channel';
    }

	/**
	 * Get event name
	 *
	 * @return string
	 */
    protected function event() {
	    return 'post-event';
    }
}
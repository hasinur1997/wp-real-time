<?php
class Test_Event extends Event {
	/**
	 * Take the channel name from the user input
	 *
	 * @return string
	 */
    protected function channel() {
    	return 'my-channel';
    }

	/**
	 * Take the event name from the user input
	 *
	 * @return string
	 */
    protected function event() {
    	return 'my-vent';
    }
}
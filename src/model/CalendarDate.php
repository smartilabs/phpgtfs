<?php
namespace smartilabs\phpgtfs\model;

class CalendarDate {
	/**
	 * Required
	 * The service_id contains an ID that uniquely identifies a set of dates when a service exception is available for one or more routes. Each (service_id, date) pair can only appear once in calendar_dates.txt. If the a service_id value appears in both the calendar.txt and calendar_dates.txt files, the information in calendar_dates.txt modifies the service information specified in calendar.txt. This field is referenced by the trips.txt file.
	 */
	public $service_id;

	/**
	 * Required
	 * The date field specifies a particular date when service availability is different than the norm. You can use the exception_type field to indicate whether service is available on the specified date.
	 * The date field's value should be in YYYYMMDD format.
	 */
	public $date;

	/**
	 * Required
	 * The exception_type indicates whether service is available on the date specified in the date field.
	 *     A value of 1 indicates that service has been added for the specified date.
	 *     A value of 2 indicates that service has been removed for the specified date.
	 * For example, suppose a route has one set of trips available on holidays and another set of trips available on all other days. You could have one service_id that corresponds to the regular service schedule and another service_id that corresponds to the holiday schedule. For a particular holiday, you would use the calendar_dates.txt file to add the holiday to the holiday service_id and to remove the holiday from the regular service_id schedule.
	 */
	public $exception_type;

	public function __toArray() {
		return [
			'service_id' => $this->service_id,
			'date' => $this->date,
			'exception_type' => $this->exception_type,
		];
	}
}
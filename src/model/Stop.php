<?php
namespace cookieguru\phpgtfs\model;

class Stop {
	/**
	 * Required
	 * Identifies a stop, station, or station entrance. The term "station entrance" refers to both station entrances
     * and station exits. Stops, stations, and station entrances are collectively referred to as locations.
     * Multiple routes can use the same stop.
	 */
	public $stop_id = null;

	/**
	 * Optional
	 * Contains some short text or a number that uniquely identifies the stop for riders.
     * Stop codes are often used in phone-based transit information systems or printed on stop signage to
     * make it easier for riders to get information for a particular stop.
     *
     * The stop_code can be the same as stop_id if the ID is public facing.
     * Leave this field blank for stops without a code presented to riders.
	 */
	public $stop_code = null;

	/**
	 * Conditionally required
     *
     * Contains the name of a location. Use a name that people understand in the local and tourist vernacular.
     *
     * When the location is a boarding area, with location_type=4, include the name of the boarding area as displayed
     * by the agency in the stop_name. It can be just one letter or text
     * like "Wheelchair boarding area" or "Head of short trains."
     *
     * This field is required for locations that are stops, stations, or entrances/exits,
     * which have location_type fields of 0, 1, and 2 respectively.
     *
     * This field is optional for locations that are generic nodes or boarding areas,
     * which have location_type fields of 3 and 4 respectively.
	 */
	public $stop_name = null;

	/**
	 * Optional
	 * Describes a location. Provide useful, quality information. Don't simply duplicate the name of the location.
	 */
	public $stop_desc = null;

	/**
	 * Required
	 * Contains the latitude of a stop, station, or station entrance.
     *
     * This field is required for locations that are stops, stations, or entrances/exits, which have
     * location_type fields of 0, 1, and 2 respectively.
     *
     * This field is optional for locations that are generic nodes or boarding areas, which have
     * location_type fields of 3 and 4 respectively.
	 */
	public $stop_lat = null;

	/**
	 * Required
	 * Contains the longitude of a stop, station, or station entrance.
     *
     * This field is required for locations that are stops, stations, or entrances/exits,
     * which have location_type fields of 0, 1, and 2 respectively.
     *
     * This field is optional for locations that are generic nodes or boarding areas,
     *
     * which have location_type fields of 3 and 4 respectively.
	 */
	public $stop_lon = null;

	/**
	 * Optional
	 * The zone_id field defines the fare zone for a stop ID. Zone IDs are required if you want to provide fare
     * information using fare_rules.txt. If this stop ID represents a station, the zone ID is ignored.
	 */
	public $zone_id = null;

	/**
	 * Optional
	 * The stop_url field contains the URL of a web page about a particular stop.
     * This should be different from the agency_url and the route_url fields.
	 * The value must be a fully qualified URL that includes http:// or https://, and any special characters
     * in the URL must be correctly escaped. See http://www.w3.org/Addressing/URL/4_URI_Recommentations.html
     * for a description of how to create fully qualified URL values.
	 */
	public $stop_url = null;

	/**
	 * Optional
     *
     * Defines the type of the location. The location_type field can have the following values:
     *      0 or (empty): Stop (or "Platform"). A location where passengers board or disembark from a transit vehicle.
     *              Stops are called a "platform" when they're defined within a parent_station.
     *      1: Station. A physical structure or area that contains one or more platforms.
     *      2: Station entrance or exit. A location where passengers can enter or exit a station from the street.
     *              The stop entry must also specify a parent_station value that references the stop_id of the parent
     *              station for the entrance. If an entrance/exit belongs to multiple stations, it's linked by
     *              pathways to both, and the data provider can either pick one station as parent,
     *              or put no parent station at all.
     *      3: Generic node. A location within a station that doesn't match any other location_type.
     *              Generic nodes are used to link together the pathways defined in pathways.txt.
     *      4: Boarding area. A specific location on a platform where passengers can board or exit vehicles.
	 */
	public $location_type = null;

	/**
	 * Optional
	 * For stops that are physically located inside stations, the parent_station field identifies the
     * station associated with the stop. Based on a combination of values for the parent_station and location_type fields,
     * we define three types of stops:
     *
     *  - A parent stop is an (often large) station or terminal building that can contain child stops.
     *      - This entry's location type is 1.
     *      - The parent_station field contains a blank value, because parent stops can't contain other parent stops.
     *  - A child stop is located inside of a parent stop. It can be an entrance, platform, node, or other pathway, as defined in pathways.txt.
     *      - This entry's location_type is 0 or (empty).
     *      - The parent_station field contains the stop ID of the station where this stop is located.
     *      - The stop referenced in parent_station must have location_type=1.
     *  - A standalone stop is located outside of a parent stop.
     *      -This entry's location type is 0 or (empty).
     *      - The parent_station field contains a blank value, because the parent_station field doesn't apply to this stop.
	 */
	public $parent_station = null;

	/**
	 * Optional
	 * Contains the timezone of this location. If omitted, it's assumed that the stop is located in the timezone
     * specified by the agency_timezone in agency.txt.
     *
     * When a stop has a parent station, the stop has the timezone specified by the parent station's stop_timezone value.
     * If the parent has no stop_timezone value, the stops that belong to that station are assumed to be in the timezone
     * specified by agency_timezone, even if the stops have their own stop_timezone values.
     *
     * In other words, if a given stop has a parent_station value, any stop_timezone value specified for that stop
     * must be ignored. Even if stop_timezone values are provided in stops.txt, continue to specify the times in
     * stop_times.txt relative to the timezone specified by the agency_timezone field in agency.txt. This ensures that
     * the time values in a trip always increase over the course of a trip, regardless of which timezones
     * the trip crosses.
	 */
	public $stop_timezone = null;

	/**
	 * Optional
     *
	 * Identifies whether wheelchair boardings are possible from the specified stop, station, or station entrance. This field can have the following values:
     *      0 or (empty): Indicates that there's no accessibility information available for this stop.
     *      1: Indicates that at least some vehicles at this stop can be boarded by a rider in a wheelchair.
     *      2: Indicates that wheelchair boarding isn't possible at this stop.
     *
     * When a stop is part of a larger station complex, as indicated by the presence of a parent_station value,
     * the stop's wheelchair_boarding field has the following additional semantics:
     *      0 or (empty): The stop inherits its wheelchair_boarding value from the parent station if it exists.
     *      1: Some accessible path exists from outside the station to the specific stop or platform.
     *      2: There are no accessible paths from outside the station to the specific stop or platform.
     *
     * For station entrances/exits, the wheelchair_boarding field has the following additional semantics:
     *      0 or (empty): The station entrance inherits its wheelchair_boarding value from the parent station if it exists.
     *      1: The station entrance is wheelchair accessible, such as when an elevator is available to reach platforms that aren't at-grade.
     *      2: There are no accessible paths from the entrance to the station platforms.
	 */
	public $wheelchair_boarding = null;

    /**
     * Optional
     * Provides the level of the location. The same level can be used by multiple unlinked stations.
     */
	public $level_id = null;

    /**
     * Optional
     * Provides the platform identifier for a platform stop, which is a stop that belongs to a station.
     * Just include the platform identifier, such as G or 3. Don't include words like "platform" or "track" or the
     * feed's language-specific equivalent. This allows feed consumers to more easily internationalize and localize
     * the platform identifier into other languages.
     */
	public $platform_code = null;

	public function __toArray() {
		return [
			'stop_id' => $this->stop_id,
			'stop_code' => $this->stop_code,
			'stop_name' => $this->stop_name,
			'stop_desc' => $this->stop_desc,
			'stop_lat' => $this->stop_lat,
			'stop_lon' => $this->stop_lon,
			'zone_id' => $this->zone_id,
			'stop_url' => $this->stop_url,
			'location_type' => $this->location_type,
			'parent_station' => $this->parent_station,
			'stop_timezone' => $this->stop_timezone,
			'wheelchair_boarding' => $this->wheelchair_boarding,
            'level_id' => $this->level_id,
            'platform_code' => $this->platform_code,
		];
	}
}
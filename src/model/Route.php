<?php
namespace smartilabs\phpgtfs\model;

class Route {
	/**
	 * Required
	 * The route_id field contains an ID that uniquely identifies a route. The route_id is dataset unique.
	 */
	public $route_id;
	
	/**
	 * Optional
	 * The agency_id field defines an agency for the specified route. This value is referenced from the agency.txt file. Use this field when you are providing data for routes from more than one agency.
	 */
	public $agency_id;
	
	/**
	 * Required
	 * The route_short_name contains the short name of a route. This will often be a short, abstract identifier like "32", "100X", or "Green" that riders use to identify a route, but which doesn't give any indication of what places the route serves. At least one of route_short_name or route_long_name must be specified, or potentially both if appropriate. If the route does not have a short name, please specify a route_long_name and use an empty string as the value for this field.
	 */
	public $route_short_name;
	
	/*
	 * Required
	 * The route_long_name contains the full name of a route. This name is generally more descriptive than the route_short_name and will often include the route's destination or stop. At least one of route_short_name or route_long_name must be specified, or potentially both if appropriate. If the route does not have a long name, please specify a route_short_name and use an empty string as the value for this field.
	 */
	public $route_long_name;
	
	/**
	 * Optional
	 * The route_desc field contains a description of a route. Please provide useful, quality information. Do not simply duplicate the name of the route. For example, "A trains operate between Inwood-207 St, Manhattan and Far Rockaway-Mott Avenue, Queens at all times. Also from about 6AM until about midnight, additional A trains operate between Inwood-207 St and Lefferts Boulevard (trains typically alternate between Lefferts Blvd and Far Rockaway)."
	 */
	public $route_desc;
	
	/**
	 * Required
	 * 	The route_type field describes the type of transportation used on a route. Valid values for this field are:
	 *    0 - Tram, Streetcar, Light rail. Any light rail or street level system within a metropolitan area.
	 *    1 - Subway, Metro. Any underground rail system within a metropolitan area.
	 *    2 - Rail. Used for intercity or long-distance travel.
	 *    3 - Bus. Used for short- and long-distance bus routes.
	 *    4 - Ferry. Used for short- and long-distance boat service.
	 *    5 - Cable car. Used for street-level cable cars where the cable runs beneath the car.
	 *    6 - Gondola, Suspended cable car. Typically used for aerial cable cars where the car is suspended from the cable.
	 *    7 - Funicular. Any rail system designed for steep inclines.
	 */
	public $route_type;

	/**
	 * Optional
	 * The route_url field contains the URL of a web page about that particular route. This should be different from the agency_url.
	 * The value must be a fully qualified URL that includes http:// or https://, and any special characters in the URL must be correctly escaped. See http://www.w3.org/Addressing/URL/4_URI_Recommentations.html for a description of how to create fully qualified URL values.
	 */
	public $route_url;
	
	/**
	 * Optional
	 * In systems that have colors assigned to routes, the route_color field defines a color that corresponds to a route. The color must be provided as a six-character hexadecimal number, for example, 00FFFF. If no color is specified, the default route color is white (FFFFFF).
	 * The color difference between route_color and route_text_color should provide sufficient contrast when viewed on a black and white screen. The W3C Techniques for Accessibility Evaluation And Repair Tools document offers a useful algorithm for evaluating color contrast. There are also helpful online tools for choosing contrasting colors, including the snook.ca Color Contrast Check application.
	 */
	public $route_color;
	
	/**
	 * Optional
	 * The route_text_color field can be used to specify a legible color to use for text drawn against a background of route_color. The color must be provided as a six-character hexadecimal number, for example, FFD700. If no color is specified, the default text color is black (000000).
	 * The color difference between route_color and route_text_color should provide sufficient contrast when viewed on a black and white screen.
	 */
	public $route_text_color;

	public function __toArray() {
		return [
			'route_id' => $this->route_id,
			'agency_id' => $this->agency_id,
			'route_short_name' => $this->route_short_name,
			'route_long_name' => $this->route_long_name,
			'route_desc' => $this->route_desc,
			'route_type' => $this->route_type,
			'route_url' => $this->route_url,
			'route_color' => $this->route_color,
			'route_text_color' => $this->route_text_color,
		];
	}
}
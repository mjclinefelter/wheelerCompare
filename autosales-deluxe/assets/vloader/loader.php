<?php
add_action('wp_ajax_rw_api_data', 'rw_api_data');	// load API data
function rw_api_data(){
	if ( isset($_POST["vin"]) && strlen($_POST["vin"]) === 17 ){

		$api_key = get_option('Edmund_API');
		$vin = $_POST["vin"];

		// get basic details
		$url = sprintf( "https://api.edmunds.com/api/vehicle/v2/vins/%s?&fmt=json&api_key=%s" , $vin , $api_key );

        $get_response = wp_remote_get($url); 

        if( !is_wp_error( $get_response ) ) :

            $basic_data = json_decode( $get_response["body"], TRUE);

            $style_id = isset($_POST["style"]) && $_POST["style"] ? $_POST["style"] : false;
            $post_id = (int)$_POST["ID"];

            if( !isset( $basic_data["errorType"] ) ) :

                $styles = array();
                $elements = array();

                foreach( $basic_data['years'] as $year ):

                    foreach( $year["styles"] as $style ) :

                        $styles[] = array(
                            "year" => $year["year"],
                            "style" => $style
                        );

                    endforeach;

                endforeach;


                if( count( $styles ) === 1 || $style_id !== false ) :

                    $style_id = $style_id ? $style_id : $basic_data['years'][0]["styles"][0]["id"];


            		// get equipment details
            		$url = sprintf( "https://api.edmunds.com/api/vehicle/v2/styles/%s/equipment?fmt=json&api_key=%s",$style_id,$api_key);
                    $get_response = wp_remote_get($url); 

                    if( !is_wp_error( $get_response ) ) :

                        $equipment_data = json_decode($get_response["body"], TRUE);

                        $features = array();
                       	// Year
                		$elements["year"] = $basic_data['years'][0]["year"];

                        foreach( $basic_data["colors"] as $color ):

                            if( $color['category'] == "Interior" || $color['category'] == "Exterior" ) :

                                $color_key = strtolower($color['category']);

                                foreach( $color["options"] as $color_option ) :

                                    if( !empty( $elements[$color_key] ) ) $elements[$color_key] .= ", " ; else $elements[$color_key]  = "";

                                    $elements[$color_key] .= $color_option["name"];

                                endforeach;

                            endif;

                        endforeach;

                		// Vehicle Type
                		switch( strtolower( $basic_data["categories"]["vehicleStyle"] ) ) :

                			case "sedan" :
                				$elements["vehicletype"] = "Sedans and Coupes";
                			break;

                			case "coupe" :
                				$elements["vehicletype"] = "Sports Cars";
                			break;

                			case "wagon" :
                				$elements["vehicletype"] = "Wagons";
                			break;

                			case "passenger minivan" :
                				$elements["vehicletype"] = "Minivans and Vans";
                			break;

                			case "crew cab pickup" :
                				$elements["vehicletype"] = "Pickup Trucks";
                			break;

                			case "4dr hatchback" :
                				$elements["vehicletype"] = "Hybrids";
                			break;

                			case "convertible" :
                				$elements["vehicletype"] = "Convertibles";
                			break;

                			case "4dr suv" :
                				$elements["vehicletype"] = "Sport Utilities";
                			break;

                			default :
                				$elements["vehicletype"] = $basic_data["categories"]["vehicleStyle"];
                			break;

                		endswitch;

                		// Drive
                        $elements['drive'] = $basic_data['drivenWheels'];

                		// Transmission
                		switch( $basic_data["transmission"]["transmissionType"] ) :

                			case "AUTOMATIC" :
                				$elements['transmission'] = 'Automatic';
                			break;

                			case "MANUAL" :
                				$elements['transmission'] = 'Manual';
                			break;

                			case "SEMI-AUTO" :
                				$elements['transmission'] = 'Semi-Auto';
                			break;

                			default :
                				$elements['transmission'] = 'Other';
                			break;

                		endswitch;

                		// VIN
                		$elements['vin'] = $basic_data["vin"];	

                		// Engine Size
                		$elements['enginesize'] = $basic_data['engine']['size'];
                		// Number of Cylinders
                		$elements['cylinders'] = $basic_data['engine']['cylinder'];
                		// Horsepower
                		$elements['horsepower'] = $basic_data['engine']['horsepower'];

                		$elements['enginetype'] = $basic_data['engine']['type'];

                        $equipment_relations = array(
                        	"Air Conditioning" => array(
                        		"Front Air Conditioning" => "FRONT_AIR_CONDITIONING"
                        	),
                        	"Brake System" => array(
                        		"Front Brake Type" => "FRONT_BRAKE_TYPE",
                        		"Rear Brake Diameter" => "REAR_BRAKE_DIAMETER",
                        		"Braking Assist" => "BRAKING_ASSIST",
                        		"Antilock Braking System" => "ANTILOCK_BRAKING_SYSTEM"
                        	),
                        	"Security" => array(
                        		"Power Door Locks" => "POWER_DOOR_LOCKS",
                        		"Anti Theft Alarm System" => "ANTI_THEFT_ALARM_SYSTEM"
                        	),
                        	"Mirrors" => array(
                        		"1st Row Vanity Mirrors" => "1ST_ROW_VANITY_MIRRORS",
                        		"Heated Driver Side Mirror" => "HEATED_DRIVER_SIDE_MIRROR",
                        		"Heated Passenger Side Mirror" => "HEATED_PASSENGER_SIDE_MIRROR",
                        		"Auto Dimming Rearview Mirror" => "AUTO_DIMMING_REARVIEW_MIRROR"
                        	),
                        	"Tires" => array(
                        		"option" =>  "tires"
                        	),
                        	"Suspension" => array(
                        		"Rear Suspension Type" => "REAR_SUSPENSION_TYPE",
                        		"Independent Suspension" => "INDEPENDENT_SUSPENSION",
                        		"Front Suspension Type" => "FRONT_SUSPENSION_TYPE"
                        	),
                        	"Airbags" => array(
                        		"Passenger Airbag" => "PASSENGER_AIRBAG"
                        	),
                        	"Specifications" => array(
                        		"Fuel Capacity" => "fuelcapacity",
                        		"Curb Weight" => "curbweight",
                        		"Epa City Mpg" => "EPA_CITY_MPG",
                        		"Epa Highway Mpg" => "EPA_HIGHWAY_MPG"
                        	),
                        	"Cargo Dimensions" => array(
                        		"Max Cargo Capacity" => "MAX_CARGO_CAPACITY"
                        	),
                        	"Exterior Dimensions" => array(
                        		"Overall Width Without Mirrors" => "width",
                        		"Overall Height" => "height",
                        		"Overall Length" => "overalllength",
                        		"Wheelbase" => "wheelbase"
                        	),
                        	"Interior Dimensions" => array(
                        		"1st Row Head Room" => "headroom",
                        		"1st Row Leg Room" => "legroom",
                        		"1st Row Head Room" => "headroom"
                        	),
                        	"Steering Wheel" => array(
                        		"Audio Controls On Steering Wheel" => "AUDIO_CONTROLS_ON_STEERING_WHEEL",
                        		"Cruise Controls On Steering Wheel" => "CRUISE_CONTROLS_ON_STEERING_WHEEL"
                        	),
                        	"Misc. Exterior Features" => array(
                        		"Roof Rack" => "ROOF_RACK",
                        		"Running Boards" => "RUNNING_BOARDS"
                        	),
                        	"Misc. Interior Features" => array(
                        		"Cruise Control" => "CRUISE_CONTROL"
                        	),
                        	"2nd Row Seats" => array(
                        		"Folding 2nd Row" => "FOLDING_2ND_ROW"
                        	),
                        	"Power Outlets" => array(
                        		"1st Row Power Outlet" => "1ST_ROW_POWER_OUTLET",
                        		"Cargo Area Power Outlet" => "CARGO_AREA_POWER_OUTLET"
                        	),
                        	"Trailer Hitch" => "TRAILER_HITCH",
                        	"Trailer Wiring" => "TRAILER_WIRING",
                        	"Running Boards" => "RUNNING_BOARDS"
                        );

                        $tags_relations = array(
                            
                            "Airbags" => array(
                                "Side Airbags" => "name",
                                "Passenger Airbag" => "name",
                                "Head Airbags" => "name",
                                "Knee Airbags" => "name",
                                "Hip Airbags" => "name"
                            ),
                            "Air Conditioning" => array(
                                "Front Air Conditioning" => "ac",
                                "Air Filtration" => "name",
                                "Sun Sensor" => "name"
                            ),
                            "Audio System" => array(
                                "Cd Player" => "name",
                                "Cd Mp3 Playback" => "mp3",
                                "Radio" => "radio",
                                "Satellite Radio" => "name",
                                "Usb Connection" => "name"
                            ),
                            "Brake System" => array(
                                "Antilock Braking System" => "abs",
                                "Braking Assist" => "name",
                                "Brake Drying" => "name",
                                "Emergency Braking Preparation" => "name"
                            ),
                            "Convertible Roof" => array(
                                "Convertible Roof" => "name",
                                "Convertible Window" => "name"
                            ),
                            "Doors" => array(
                                "Number Of Doors" => "num_doors"
                            ),
                            "Driver Seat" => array(
                                "Heated Driver Seat" => "name",
                                "Height Adjustable Driver Seat" => "name"
                            ),
                            "Drive Type" => array(
                                "Driven Wheels" => "driven_wheels"
                            ),
                            "Exterior Lights" => array(
                                "Front Fog Lights" => "name",
                                "Headlights Auto Delay" => "had",
                                "Daytime Running Lights" => "name",
                                "Headlights Dusk Sensor" => "name"
                            ),
                            "Front Passenger Seat" => array(
                                "Heated Passenger Seat" => "name"
                            ),
                            "Instrumentation" => array(
                                "Tachometer" => "name",
                                "Low Fuel Level Indicator" => "name",
                                "Tire Pressure Monitoring System" => "name",
                                "Compass" => "name",
                                "External Temperature Gauge" => "name",
                                "Head Up Display" => "name",
                                "Trip Computer" => "name",
                                "Transmission Temperature Gauge" => "name"
                            ),
                            "Misc. Exterior Features" => array(
                                "Rear Spoiler" => "name"
                            ),
                            "Misc. Interior Features" => array(
                                "Cruise Control" => "name",
                                "Cargo Area Light" => "name",
                                "Reading Lights" => "name"
                            ),
                            "Mirrors" => array(
                                "Heated Exterior Mirrors" => "name",
                                "Heated Passenger Side Mirror" => "name",
                                "Auto Dimming Rearview Mirror" => "name",
                                "Auto Dimming Side Mirrors" => "name"
                            ),
                            "Mobile Connectivity" => array(
                                "Phone" => "name",
                                "Bluetooth" => "name"
                            ),
                            "Parking Aid" => array(
                                "Parking Sensors" => "name"
                            ),
                            "Security" => array(
                                "Engine Immobilizer" => "name",
                                "Anti Theft Alarm System" => "alarm",
                                "Power Door Locks" => "door_locks",
                                "2 Stage Unlocking" => "name"
                            ),
                            "Spare Tire/Wheel" => array(
                                "Tire Repair Kit" => "name"
                            ),
                            "Standard Audio" => array(
                                "Cd Player" => "name",
                                "Cd Mp3 Playback" => "mp3",
                                "Radio" => "radio",
                                "Satellite Radio" => "name",
                                "Usb Connection" => "name"
                            ),
                            "Steering Wheel" => array(
                                "Audio Controls On Steering Whee" => "name",
                                "Phone Controls On Steering Whee" => "name"
                            ),
                            "Sunroof" => array(
                                "Sunroof" => "name"
                            ),
                            "Windows" => array(
                                "Rear Defogger" => "name",
                                "Rain Sensing Front Wipers" => "name",
                                "Remote Window Operation" => "name"
                            )
                        );

                        foreach( $equipment_data["equipment"] as $equipment_item ) :

                        	$ename =  $equipment_item["name"];


                            // counting number of seats
                        	if( $ename == "Seating Configuration" ) : 

                        		$elements['seatingcapacity'] = 0;

                        		foreach( $equipment_item["attributes" ] as $attribute ) :

                        			$elements['seatingcapacity'] += intval($attribute["value"]);

                        		endforeach;

                            // getting engine details
                        	elseif( $ename == "Engine" ) :

                        		if( !$elements['enginesize'] ):
                        			$elements['enginesize'] = $equipment_item["size"];
                        		endif;

                        		if( !$elements['cylinders'] ):
                        			$elements['cylinders'] = $equipment_item["cylinder"];
                        		endif;

                        		if( !$elements['horsepower'] ):
                        			$elements['horsepower'] = $equipment_item["horsepower"];
                        		endif;

                        		if( !$elements['enginetype'] ):
                        			$elements['enginetype'] = $equipment_item["type"];
                        		endif;

                        	else :

                                // relation exists
                	        	if( isset( $equipment_relations[ $ename ] ) ) :


                	        		if( is_array( $equipment_relations[ $ename ] ) ) :

                		    			foreach( $equipment_item["attributes" ] as $attribute ) :

                		    				$aname = $attribute["name"];

                		    				if( isset( $equipment_relations[ $ename ][ $aname ] ) ) :

                		    					$elements[ $equipment_relations[ $ename ][ $aname ] ] = $attribute["value"];

                		    				endif;

                		    			endforeach;

                		    			if( isset( $equipment_relations[ $ename ][ "option" ] ) && isset( $equipment_item["options" ] ) && count( $equipment_item["options" ] ) > 0  ) :

                		    				$elements[  $equipment_relations[ $ename ][ "option" ] ] = $equipment_item["options" ][0]["name"];

                		    			endif;

                		    		else :

                		    			$elements[ $equipment_relations[ $ename ] ] = "Yes";

                		    		endif;

                	        	endif;

                	        endif;

                            if( isset( $tags_relations[ $ename ] ) ) :

                                foreach( $equipment_item["attributes" ] as $attribute ) :

                                    $aname = $attribute["name"];

                                    if( isset( $tags_relations[ $ename ][ $aname ] ) ) :

                                        if( $tags_relations[ $ename ][ $aname ] === "name" ):

                                            $features[ $aname ] = $aname;

                                        else :

                                            $features[ $tags_relations[ $ename ][ $aname ] ] = $attribute["value"];

                                        endif;

                                    endif;

                                endforeach;

                            endif;

                        endforeach;

                        /******** START FEATURES TAGS *************/

                        $tags = array();

                        // generate tags from matched equipment
                        foreach( $features as $feature_name=>$feature_value ) :

                            switch( $feature_name ) :

                                case "num_doors" : 
                                    $tags[] = $feature_value . " Door"; 
                                break;
                                case "abs" : 
                                    switch( $feature_value ) :
                                        case "4-wheel ABS" : 
                                            $tags[] = "4-wheel ABS Brakes";
                                        break;
                                        default :
                                            $tags[] = $feature_value;
                                        break;
                                    endswitch;
                                break;
                                case "ac" :
                                    $tags[] = "Air Conditioning"; 
                                break;
                                case "heated_exterior_mirrors" :
                                    $tags[] = "Heated Exterior Mirrors";
                                break;
                                case "driven_wheels" :
                                    $tags[] = ucwords(strtolower($feature_value));
                                break;
                                case "had" :
                                    $tags[] = "Headlights Off Auto Delay";
                                break;
                                case "mp3" :
                                    $tags[] = "mp3";
                                break;
                                case "radio" :
                                    $tags[] =  $feature_value . " Radio";
                                break;

                                default : 
                                    $tags[] = $feature_value;
                                break;

                            endswitch;

                        endforeach;


                        // Generate tags from element values 
                        foreach( $elements as $element_key=>$element_value ) :

                                switch( $element_key ) :
                                    case "seatingcapacity" : 
                                         $tags[] = $element_value . " Seats";
                                    break;
                                    case "TRAILER_HITCH" :
                                        $tags[] = "Trailer Hitch";
                                    break;
                                    case "TRAILER_WIRING" :
                                        $tags[] = "Trailer Wiring";
                                    break;
                                    case "RUNNING_BOARDS" :
                                        $tags[] = "Running Boards";
                                    break;

                                endswitch;
                        endforeach;

                        /******** END FEATURES TAGS *************/

                        if( $elements["CRUISE_CONTROLS_ON_STEERING_WHEEL"] == "cruise controls" ) :
                        	$elements["CRUISE_CONTROLS_ON_STEERING_WHEEL"] = "Yes";
                        endif;

                        if( $elements["AUDIO_CONTROLS_ON_STEERING_WHEEL"] == "audio controls" ) :
                        	$elements["AUDIO_CONTROLS_ON_STEERING_WHEEL"] = "Yes";
                        endif;

                       	$elements['Make'] = $basic_data["make"]["name"];
                       	$elements['Model'] = $basic_data["model"]["name"];	

                		// Post Data
                		$elements['post_name'] = $basic_data["model"]["id"];
                		$elements['post_title'] = $elements['Make'] . ' ' . $elements['Model'] . ' ' . $elements["year"];

                        $response["tags"] = join(",",$tags);
                    
                        $makemodel_terms = array();

                        $make_term = term_exists( $basic_data["make"]["name"] , 'makemodel' , 0 );


                        if( $make_term !== 0 && $make_term !== null ) :

                            $makemodel_terms[] = (int)$make_term["term_id"];

                        else :

                            $make_term = wp_insert_term( $basic_data["make"]["name"] , 'makemodel');

                            if( !is_wp_error( $make_term ) ) :

                                $makemodel_terms[] = (int)$make_term["term_id"];

                            endif;

                        endif;

                        $model_term = term_exists( $basic_data["model"]["name"] , 'makemodel' , $make_term["term_id"] );

                        if( $model_term !== 0 && $model_term !== null ) :

                            $makemodel_terms[] = (int)$model_term["term_id"];

                        else :
                            
                            $model_term = wp_insert_term( $basic_data["model"]["name"] , 'makemodel', array( "parent" => $make_term["term_id"] ));

                            if( !is_wp_error( $model_term ) ) :

                                $makemodel_terms[] = $model_term["term_id"];

                            endif;

                        endif;

                        wp_set_object_terms( $post_id, $makemodel_terms, 'makemodel' );
                
                        ob_start();

                        wp_terms_checklist( $post_id, array( 'taxonomy' => 'makemodel', 'popular_cats' => wp_popular_terms_checklist( 'makemodel' , "" , 10, false ) ) );

                        $elements["makemodelchecklist"] = ob_get_clean();

                        ob_start();

                        wp_popular_terms_checklist( 'makemodel' );

                        $elements["makemodelchecklist-pop"] = ob_get_clean();

                		//$elements["newtag[features]"] = join(",",$features);

                        $response["elements"] = $elements;

                        $response["error"] = false;

                    else :

                        $response["error"] = true;
                        $response["error_message"] = $get_response->get_error_message();

                    endif;

                else :

                    $response["styles"] = "<option value='' >Select specific style</option>";

                    $current_year = false;

                    foreach( $styles as $style ) :

                        if( $current_year !== $style["year"] ) :

                            if( $current_year !== false ) :

                                $response["styles"] .= "</optgroup>";
                                 
                            endif;

                            $response["styles"] .= sprintf( "<optgroup label='%s' >" , "Year " . $style["year"] );

                            $current_year = $style["year"];

                        endif;

                        $response["styles"] .= sprintf( "<option value='%s' >%s</option>" , $style["style"]["id"] , $style["style"]["name"] );

                    endforeach;

                    $response["styles"] .= "</optgroup>";

                    $response["error"] = true;

                endif;

            else :

                $response["error"] = true;
                $response["error_message"] = $basic_data["message"];

            endif;

        else :

            $response["error"] = true;
            $response["error_message"] = $get_response->get_error_message();

        endif;

        header("Content-Type:application/json");
		echo json_encode($response);
		die();
	}

}
?>
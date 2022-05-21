<?php
    
    // class auto-loader
    spl_autoload_register(
        function ($class_name) {
            // PSR-4: convert class name to file name
            $lib_file = 'ls-artdmx-php/library/' . strtr(ltrim($class_name, '\\'), ['\\' => '/']) . '.php';
            if (file_exists($lib_file)) {
                include $lib_file;
                return true;
            }
            
            // not found!
            return false;
        }
    );
    
    use LarkSpark\ArtNet\ArtDmxClient;
    
    $dmxData = [];
    
    $data = $_POST;
    $command = $data["command"] ?? [];
    if($command == "dmx"){
        $dmx = $data["dmx"] ?? [];
        if(!$dmx){
            exit(json_encode("dmx_required"));
        }
    
        try{
            $channelCount = 1; // dmx universes start at channel one
            $dmxChannelValues = [];
            $dmxData = [];
            foreach($dmx as $fixture){
                foreach($fixture as $channel){
                    $dmxChannelValues[$channelCount] = $channel;
                    array_push($dmxData, $channel);
                    $channelCount++;
                }
            }
        } catch (Exception $e) {
            exit(json_encode("invalid_request"));
        }
    }
    if(array_key_exists("presets", $data)){
        $presets = $data["presets"];
        if(!$presets){
            exit(json_encode("presets_required"));
        }
        
        try{
            $channelCount = 1; // dmx universes start at channel one
            $dmxChannelValues = [];
            $dmxData = [];
            foreach($presets[$data["currentPreset"]] as $fixture){
                foreach($fixture as $channel){
                    $dmxChannelValues[$channelCount] = $channel;
                    array_push($dmxData, $channel);
                    $channelCount++;
                }
            }
        } catch (Exception $e) {
            exit(json_encode("invalid_request"));
        }
    
        // todo:    loop through provided presets
        //          update json file
        //          update art-net device
    }
    
    
    try{
        $client = new ArtDmxClient('169.254.188.27', 6454);
    
        // broadcast our DMX values
        
        // the broadcast ends up just being a big array with key > value (channel > intensity) pairs.
        $client->broadcast($dmxData);
    } catch (Exception $e) {
        //print_r($e);
        exit(json_encode("art-net_failure"));
    }
    echo json_encode("success");
    
?>

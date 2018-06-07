<?php

namespace App\Tools;

class GooglemapTool
{
  public function getDistance($toAddress, $fromAddress) {
    $stadium = array();
    $req1 = 'https://maps.google.com/maps/api/geocode/xml';
    $req1 .= '?address='.urlencode($toAddress);
    $req1 .= '&sensor=false';
    $req1 .= '&key=AIzaSyAGfytLGitQVE3HwW6u0xjWYdcvzX_h9MY';
    $xml1 = simplexml_load_file($req1) or die('XML parsing error');
    if ($xml1->status == 'OK') {
        $location1 = $xml1->result->geometry->location;
        $stadium['lat'] = (string)$location1->lat[0];
        $stadium['lng'] = (string)$location1->lng[0];
    }

    $myhome = array();
    $req2 = 'https://maps.google.com/maps/api/geocode/xml';
    $req2 .= '?address='.urlencode($fromAddress);
    $req2 .= '&sensor=false';
    $req2 .= '&key=AIzaSyAGfytLGitQVE3HwW6u0xjWYdcvzX_h9MY';
    $xml2 = simplexml_load_file($req2) or die('XML parsing error');
    if ($xml2->status == 'OK') {
        $location2 = $xml2->result->geometry->location;
        $myhome['lat'] = (string)$location2->lat[0];
        $myhome['lng'] = (string)$location2->lng[0];
    }

    $pi1 = pi();
    $stadium['lat'] = $stadium['lat']*$pi1/180;
    $stadium['lng'] = $stadium['lng']*$pi1/180;
    $myhome['lat'] = $myhome['lat']*$pi1/180;
    $myhome['lng'] = $myhome['lng']*$pi1/180;
    $deg = sin($stadium['lat'])*sin($myhome['lat']) + cos($stadium['lat'])*cos($myhome['lat'])*cos($myhome['lng']-$stadium['lng']);
    $dist = round(6378140*(atan2(-$deg,sqrt(-$deg*$deg+1))+$pi1/2), 0);
    return $dist;
  }
}

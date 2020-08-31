<?php

namespace App\Http\Controllers;

use BigBlueButton\BigBlueButton;
use BigBlueButton\Parameters\CreateMeetingParameters;
use BigBlueButton\Parameters\GetMeetingInfoParameters;
use BigBlueButton\Parameters\JoinMeetingParameters;
use Illuminate\Http\Request;
use BigBlueButton\Util\UrlBuilder;


class BBBController extends BigBlueButton
{

    public function setBBB(){
        $this->securitySecret   = 'jqSTYJF5TMMEVgcPf5wjotYp6DKVGXCjN6B5OuR5HX0';
        $this->bbbServerBaseUrl = 'https://srv2.shayanlms.com/bigbluebutton/';
        $this->urlBuilder       = new UrlBuilder($this->securitySecret, $this->bbbServerBaseUrl);

    }

    public function createRoom($meeting,$name)
    {
        $meetingID=$meeting->id;
        $this->setBBB();
        $createMeetingParams = new CreateMeetingParameters($meetingID,$name );
        $createMeetingParams->setAttendeePassword('1234irmd98');
        $createMeetingParams->setModeratorPassword('4321irmd98');
        $createMeetingParams->setLogoutUrl('https://shayanlms.com');
        $createMeetingParams->setRecord(false);
        $createMeetingParams->setAllowStartStopRecording(false);
        $createMeetingParams->setAutoStartRecording(false);
        $createMeetingParams->setLockSettingsLockedLayout(true);
        $createMeetingParams->setLockSettingsDisableNote(true);
        $createMeetingParams->setLogo('https://shayanlms.com/assets/publicTheme/img/logo2.png');
        $createMeetingParams->setWelcomeMessage('سلام خوش آمدید');
        $createMeetingParams->setCopyright('shayanLMS :)');
        if(!$meeting->isActiveWebcam)
            $createMeetingParams->setLockSettingsDisableCam(true);
        $createMeetingParams->setMuteOnStart(true);


        $response = $this->createMeeting($createMeetingParams);
        if ($response->getReturnCode() == 'FAILED') {
            return false;
        }else{
            return true;
        }
    }
    public function joinRoom($meeting,$name){
        $meetingID=$meeting->id;
        $roomName=$meeting->title;
//        return $this->bbbServerBaseUrl;
        $this->setBBB();
        if( !$this->getInfo($meetingID)) {
            $this->createRoom($meeting, $roomName);
        }

        $joinMeetingParams = new JoinMeetingParameters($meetingID, $name, '1234irmd98');
        $joinMeetingParams->setRedirect(true);
        $joinMeetingParams->addUserData('customStyleUrl','https://srv1.shayanlms.com/custom.css');
        $joinMeetingParams->addUserData('bbb_display_branding_area',true);
        $joinMeetingParams->addUserData('autoJoin',true);
        $joinMeetingParams->addUserData('bbb_skip_check_audio',true);
//        $joinMeetingParams->addUserData('bbb_show_participants_on_login',false);
//        $joinMeetingParams->addUserData('bbb_show_public_chat_on_login',true);
        if(!$meeting->isActiveMic) {
            $joinMeetingParams->addUserData('listenOnlyMode', true);
            $joinMeetingParams->addUserData('bbb_force_listen_only', true);
        }
        $url = $this->getJoinMeetingURL($joinMeetingParams);
        return $url;
    }
    public function joinRoomAdmin($meeting,$name){
        $meetingID=$meeting->id;
        $roomName=$meeting->title;
        $this->setBBB();
        if( !$this->getInfo($meetingID)) {
            $this->createRoom($meeting, $roomName);
        }
        $joinMeetingParams = new JoinMeetingParameters($meetingID, $name, '4321irmd98');
        $joinMeetingParams->setRedirect(true);
//        $joinMeetingParams->addUserData('customStyleUrl','https://srv2.shayanlms.com/custom.css');
        $joinMeetingParams->addUserData('bbb_display_branding_area',true);
        $joinMeetingParams->addUserData('listenOnlyMode',false);
        $joinMeetingParams->addUserData('autoJoin',true);
        $joinMeetingParams->addUserData('autoShareWebcam',true);
        $joinMeetingParams->addUserData('bbb_skip_check_audio',true);

//        $local=urlencode("['override_locale'=>'fa']");
//        $joinMeetingParams->addUserData('bbb_application',$local);

        $joinMeetingParams->addUserData('bbb_client_title',__('info.baseTitle'));


        $url = $this->getJoinMeetingURL($joinMeetingParams);
        return $url;
    }
    public function getInfo($meetingID){
        $this->setBBB();
        $getMeetingInfoParams = new GetMeetingInfoParameters($meetingID, '4321irmd98');
        $response = $this->getMeetingInfo($getMeetingInfoParams);
        if ($response->getReturnCode() == 'FAILED') {
            // meeting not found or already closed
            return false;
        } else {
            // process $response->getRawXml();
            return true;
        }
    }
    public function GetListOfUser($meetingID){
        $this->setBBB();
        try{

            $getMeetingInfoParams = new GetMeetingInfoParameters($meetingID, '4321irmd98');
            $response = $this->getMeetingInfo($getMeetingInfoParams);
            if ($response->getReturnCode() == 'FAILED') {
                return false;
            } else {
                return $response->getRawXml();
            }
        }catch (\Exception $e){
            return false;
        }
    }


}

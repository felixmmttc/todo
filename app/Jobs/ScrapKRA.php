<?php

namespace App\Jobs;

use App\Models\NationalRegistry;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class ScrapKRA implements ShouldQueue
{
    use Batchable,Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function handle()
    {
        $url = 'https://itax.kra.go.ke/KRA-Portal/dwr/call/plaincall/FetchRegistrationDtl.fetchNatRegDtlsByNIDAmd.dwr';

        $response = Http::asForm()->post($url, [
                'callCount'       => '1',
                'windowName'      => 'kenya',
                'c0-scriptName'   => 'FetchRegistrationDtl',
                'c0-methodName'   => 'fetchNatRegDtlsByNIDAmd',
                'c0-id'           => '0',
                'c0-param0'       => "string:$this->id",
                'batchId'         => '9',
                'page'            => "/KRA-Portal/eTreAmendment.htm?actionCode=loadAmendmentIndi&applicantType=T&applicantPin=A001KIUAS",
                'httpSessionId'   => '',
                'scriptSessionId' => '1FDBC5175C818C58B9E785339A82377A'
            //c1-id:0
            //c1-scriptName:FetchRegistrationDtl
        ]);

        if ($response->successful()) {

            preg_match('/({).*(})/s', $response->body(), $matches);

            if ($matches[0] !== null) {

                $toArray = str_replace("\"", "", $matches[0]);

                preg_match('/(?<=activeFlag:).*?(?=,)/s', $toArray, $activeFlag);
                preg_match('/(?<=birthDistrict:).*?(?=,)/s', $toArray, $birthDistrict);
                preg_match('/(?<=birthTown:).*?(?=,)/s', $toArray, $birthTown);
                preg_match('/(?<=citizen:).*?(?=,)/s', $toArray, $citizen);
                preg_match('/(?<=createdBy:).*?(?=,)/s', $toArray, $createdBy);
                preg_match('/(?<=createdDt:).*?(?=,)/s', $toArray, $createdDt);
                preg_match('/(?<=dbirth:).*?(?=,)/s', $toArray, $dbirth);
                preg_match('/(?<=dbirth2:).*?(?=,)/s', $toArray, $dbirth2);
                preg_match('/(?<=fatherBirthDistrict:).*?(?=,)/s', $toArray, $fatherBirthDistrict);
                preg_match('/(?<=fatherBirthTown:).*?(?=,)/s', $toArray, $fatherBirthTown);
                preg_match('/(?<=fatherDateBirth:).*?(?=,)/s', $toArray, $fatherDateBirth);
                preg_match('/(?<=fatherIdentityId:).*?(?=,)/s', $toArray, $fatherIdentityId);
                preg_match('/(?<=fatherLastName:).*?(?=,)/s', $toArray, $fatherLastName);
                preg_match('/(?<=fatherMiddleName:).*?(?=,)/s', $toArray, $fatherMiddleName);
                preg_match('/(?<=fathersFirstName:).*?(?=,)/s', $toArray, $fathersFirstName);
                preg_match('/(?<=dateBirth:).*?(?=,)/s', $toArray, $dateofBirth);
                preg_match('/(?<=fingerPrint:).*?(?=,)/s', $toArray, $fingerPrint);
                preg_match('/(?<=firstName:).*?(?=,)/s', $toArray, $firstName);
                preg_match('/(?<=identityId:).*?(?=,)/s', $toArray, $identityId);
                preg_match('/(?<=isAlreadyRegistered:).*?(?=,)/s', $toArray, $isAlreadyRegistered);
                preg_match('/(?<=Mig:).*?(?=,)/s', $toArray, $Mig);
                preg_match('/(?<=isValidNID:).*?(?=,)/s', $toArray, $isValidNID);
                preg_match('/(?<=issueDate:).*?(?=,)/s', $toArray, $issueDate);
                preg_match('/(?<=issuePlace:).*?(?=,)/s', $toArray, $issuePlace);
                preg_match('/(?<=lastName:).*?(?=,)/s', $toArray, $lastName);
                preg_match('/(?<=maritalStatus:).*?(?=,)/s', $toArray, $maritalStatus);
                preg_match('/(?<=middleName:).*?(?=,)/s', $toArray, $middleName);
                preg_match('/(?<=motherBirthDistrict:).*?(?=,)/s', $toArray, $motherBirthDistrict);
                preg_match('/(?<=motherBirthTown:).*?(?=,)/s', $toArray, $motherBirthTown);
                preg_match('/(?<=motherDateBirth:).*?(?=,)/s', $toArray, $motherDateBirth);
                preg_match('/(?<=motherIdentityId:).*?(?=,)/s', $toArray, $motherIdentityId);
                preg_match('/(?<=motherLastName:).*?(?=,)/s', $toArray, $motherLastName);
                preg_match('/(?<=motherMiddleName:).*?(?=,)/s', $toArray, $motherMiddleName);
                preg_match('/(?<=mothersFirstName:).*?(?=,)/s', $toArray, $mothersFirstName);
                preg_match('/(?<=natRegId:).*?(?=,)/s', $toArray, $natRegId);
                preg_match('/(?<=photo:).*?(?=,)/s', $toArray, $photo);
                preg_match('/(?<=physicalAddress:).*?(?=,)/s', $toArray, $physicalAddress);
                preg_match('/(?<=pinNoforRegNIDMig:).*?(?=,)/s', $toArray, $pinNoforRegNIDMig);
                preg_match('/(?<=replicationDt:).*?(?=,)/s', $toArray, $replicationDt);
                preg_match('/(?<=sex:).*?(?=,)/s', $toArray, $sex);
                preg_match('/(?<=spouseBirthDistrict:).*?(?=,)/s', $toArray, $spouseBirthDistrict);
                preg_match('/(?<=spouseBirthTown:).*?(?=,)/s', $toArray, $spouseBirthTown);
                preg_match('/(?<=spouseDateBirth:).*?(?=,)/s', $toArray, $spouseDateBirth);
                preg_match('/(?<=spouseFirstName:).*?(?=,)/s', $toArray, $spouseFirstName);
                preg_match('/(?<=spouseIdentityId:).*?(?=,)/s', $toArray, $spouseIdentityId);
                preg_match('/(?<=spouseLastName:).*?(?=,)/s', $toArray, $spouseLastName);
                preg_match('/(?<=spouseMiddleName:).*?(?=,)/s', $toArray, $spouseMiddleName);
                preg_match('/(?<=updatedBy:).*?(?=,)/s', $toArray, $updatedBy);
                preg_match('/(?<=updatedDt:).*?(?=,)/s', $toArray, $updatedDt);

                if ($identityId[0] === null || $identityId[0] === 'null') {

                    return;
                }

                $details = new NationalRegistry();

                $details->activeFlag = $activeFlag[0] ?? '';
                $details->birthDistrict = $birthDistrict[0] ?? '';
                $details->birthTown = $birthTown[0] ?? '';
                $details->citizen = $citizen[0] ?? '';
                $details->createdBy = $createdBy[0] ?? '';
                $details->createdDt = $createdDt[0] ?? '';
                $details->dbirth = $dbirth[0] ?? '';
                $details->dbirth2 = $dbirth2[0] ?? '';
                $details->fatherBirthDistrict = $fatherBirthDistrict[0] ?? '';
                $details->fatherBirthTown = $fatherBirthTown[0] ?? '';
                $details->fatherDateBirth = $fatherDateBirth[0] ?? '';
                $details->fatherIdentityId = $fatherIdentityId[0] ?? '';
                $details->fatherLastName = $fatherLastName[0] ?? '';
                $details->fatherMiddleName = $fatherMiddleName[0] ?? '';
                $details->fathersFirstName = $fathersFirstName[0] ?? '';
                $details->dateBirth = $dateofBirth[0] ?? '';
                $details->fingerPrint = $fingerPrint[0] ?? '';
                $details->firstName = $firstName[0] ?? '';
                $details->identityId = $identityId[0] ?? '';
                $details->isAlreadyRegistered = $isAlreadyRegistered[0] ?? '';
                $details->Mig = $Mig[0] ?? '';
                $details->isValidNID = $isValidNID[0] ?? '';
                $details->issueDate = $issueDate[0] ?? '';
                $details->issuePlace = $issuePlace[0] ?? '';
                $details->lastName = $lastName[0] ?? '';
                $details->maritalStatus = $maritalStatus[0] ?? '';
                $details->middleName = $middleName[0] ?? '';
                $details->motherBirthDistrict = $motherBirthDistrict[0] ?? '';
                $details->motherBirthTown = $motherBirthTown[0] ?? '';
                $details->motherDateBirth = $motherDateBirth[0] ?? '';
                $details->motherIdentityId = $motherIdentityId[0] ?? '';
                $details->motherLastName = $motherLastName[0] ?? '';
                $details->motherMiddleName = $motherMiddleName[0] ?? '';
                $details->mothersFirstName = $mothersFirstName[0] ?? '';
                $details->natRegId = $natRegId[0] ?? '';
                $details->photo = $photo[0] ?? '';
                $details->physicalAddress = $physicalAddress[0] ?? '';
                $details->pinNoforRegNIDMig = $pinNoforRegNIDMig[0] ?? '';
                $details->replicationDt = $replicationDt[0] ?? '';
                $details->sex = $sex[0] ?? '';
                $details->spouseBirthDistrict = $spouseBirthDistrict[0] ?? '';
                $details->spouseBirthTown = $spouseBirthTown[0] ?? '';
                $details->spouseDateBirth = $spouseDateBirth[0] ?? '';
                $details->spouseFirstName = $spouseFirstName[0] ?? '';
                $details->spouseIdentityId = $spouseIdentityId[0] ?? '';
                $details->spouseLastName = $spouseLastName[0] ?? '';
                $details->spouseMiddleName = $spouseMiddleName[0] ?? '';
                $details->updatedBy = $updatedBy[0] ?? '';
                $details->updatedDt = $updatedDt[0] ?? '';
                $details->meta = $toArray;
                $details->saveOrFail();

            }
        }
    }
}
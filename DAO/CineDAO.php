<?php
    namespace DAO;

    use DAO\ICineDAO as ICineDAO;
    use Models\Cine as Cine;

    class CineDAO implements ICineDAO
    {
        private $cineList = array();

        public function Add(Cine $cine)
        {
            $this->RetrieveData();
            
            array_push($this->cineList, $cine);

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->cineList;
        }

        public function GetCineById ($id)
        {            
            $this->RetrieveData();            

            foreach($cineList as $cine)
            {
                if ($cine->GetId() == $id) 
                return $cine;
            }            
        }

        public function GetNewId ()
        {
            $this->RetrieveData();
            $newId;

            foreach($cineList as $cine)
            {
                if ($cine->getId() > $newId)
                {
                    $newId = $cine->getId();
                }
            }
            
            return ($newId + 1);   
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->cineList as $cine)
            {                
                $valuesArray["id"] = $cine->getId();
                $valuesArray["name"] = $cine->getName();
                $valuesArray["totalCapacity"] = $cine->getTotalCapacity();
                $valuesArray["address"] = $cine->getAddress();
                $valuesArray["ticketValue"] = $cine->getTicketValue();

                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/cines.json', $jsonContent);
        }

        private function RetrieveData()
        {
            $this->cineList = array();

            if(file_exists('Data/cines.json'))
            {
                $jsonContent = file_get_contents('Data/cines.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $cine = new cine(
                        $valuesArray["id"],
                        $valuesArray["name"],
                        $valuesArray["totalCapacity"],
                        $valuesArray["address"],
                        $valuesArray["ticketValue"]
                    );

                    array_push($this->cineList, $cine);
                }
            }
        }
    }
?>
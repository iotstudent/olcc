<?php include "../includes/dbconnection.php";?>
<?php
                
     function countDrafts(){
        global $conn;
        global $id;
        $draft_number = '';
        $sql= (" SELECT COUNT(message_id) AS nodrafts FROM message WHERE message_status ='draft' ;");
        if($result = mysqli_query($conn,$sql)){ 
                if (mysqli_num_rows($result)>0){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $draft_number = $row['nodrafts'];
                        echo $draft_number;   
                }
            }else { 
                echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
            }
    
        }

        function countPublished(){
            global $conn;
            global $id;
            $publish_number = '';
            $sql= (" SELECT COUNT(message_id) AS nopublish FROM message WHERE  message_status ='published' ;");
            if($result = mysqli_query($conn,$sql)){ 
                    if (mysqli_num_rows($result)>0){
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            $publish_number = $row['nopublish'];
                            echo $publish_number;   
                    }
                }else { 
                    echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
                }
        
            }

            function countMessages(){
                global $conn;
                global $id;
                $message_number = '';
                $sql= (" SELECT COUNT(message_id) AS nomessage FROM message ");
                if($result = mysqli_query($conn,$sql)){ 
                        if (mysqli_num_rows($result)>0){
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                $message_number = $row['nomessage'];
                                echo $message_number;   
                        }
                    }else { 
                        echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
                    }
            
                }
            
                function countMembers(){
                    global $conn;
                    $number = '';
                    $sql= (" SELECT COUNT(user_id) AS nousers FROM users;");
                    if($result = mysqli_query($conn,$sql)){ 
                            if (mysqli_num_rows($result)>0){
                                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    $number = $row['nousers'];
                                    echo $number;   
                            }
                        }else { 
                            echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
                        }
                
                    }

                
                    function countDues(){
                        global $conn;
                        $number = '';
                        $sql= (" SELECT COUNT(renewal_id) AS norenewal FROM membership_renewal;");
                        if($result = mysqli_query($conn,$sql)){ 
                                if (mysqli_num_rows($result)>0){
                                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                        $number = $row['norenewal'];
                                        echo $number;   
                                }
                            }else { 
                                echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
                            }
                    
                        }
                    
                        function countVacancy(){
                            global $conn;
                            $number = '';
                            $sql= (" SELECT COUNT(job_id) AS nojobs FROM jobs;");
                            if($result = mysqli_query($conn,$sql)){ 
                                    if (mysqli_num_rows($result)>0){
                                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                            $number = $row['nojobs'];
                                            echo $number;   
                                    }
                                }else { 
                                    echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
                                }
                        
                            }
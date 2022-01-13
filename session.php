<?php
if(isset($_POST['confirm'])){
    
         //POSTデータをSESSIONに格納
          if(isset($_POST['name']) && $_POST['name'] != '')
          $_SESSION['name'] = $_POST['name'];
          else
          $_SESSION['name'] = '';

          if(isset($_POST['name_jp']) && $_POST['name_jp'] != '')
          $_SESSION['name_jp'] = $_POST['name_jp'];
          else
          $_SESSION['name_jp'] = '';
      
          if(isset($_POST['age']) && $_POST['age'] != '')
          $_SESSION['age'] = $_POST['age'];
          else
          $_SESSION['age'] = '';
            
          if(isset($_POST['gender']) && $_POST['gender'] != '')
          $_SESSION['gender'] = $_POST['gender'];
          else
          $_SESSION['gender'] = '';
            
          if(isset($_POST['phone']) && $_POST['phone'] != '')
          $_SESSION['phone'] = $_POST['phone'];
          else
          $_SESSION['phone'] = '';
            
          if(isset($_POST['address']) && $_POST['address'] != '')
          $_SESSION['address'] = $_POST['address'];
          else
          $_SESSION['address'] = '';
      
          if(isset($_POST['condition']['fever']) && $_POST['condition']['fever'] != '')
          $_SESSION['condition']['fever'] = $_POST['condition']['fever'];
          else
          $_SESSION['condition']['fever']= '';
      
          if(isset($_POST['condition']['throat'] ) && $_POST['condition']['throat']  != '')
          $_SESSION['condition']['throat']  = $_POST['condition']['throat'] ;
          else
          $_SESSION['condition']['throat']  = '';
      
      
          if(isset($_POST['condition']['cough'] ) && $_POST['condition']['cough']  != '')
          $_SESSION['condition']['cough']  = $_POST['condition']['cough'] ;
          else
          $_SESSION['condition']['cough']  = '';
      
      
          if(isset($_POST['condition']['spit'] ) && $_POST['condition']['spit']  != '')
          $_SESSION['condition']['spit']  = $_POST['condition']['spit'] ;
          else
          $_SESSION['condition']['spit']  = '';
      
          if(isset($_POST['treat']['none']) && $_POST['treat']['none'] != '')
          $_SESSION['treat']['none'] = $_POST['treat']['none'];
          else
          $_SESSION['treat']['none'] = '';
      
      
          if(isset($_POST['treat']['hbp']) && $_POST['treat']['hbp'] != '')
          $_SESSION['treat']['hbp'] = $_POST['treat']['hbp'];
          else
          $_SESSION['treat']['hbp'] = '';
      
      
          if(isset($_POST['treat']['diabetic']) && $_POST['treat']['diabetic'] != '')
          $_SESSION['treat']['diabetic'] = $_POST['treat']['diabetic'];
          else
          $_SESSION['treat']['diabetic'] = '';
      
      
          if(isset($_POST['treat']['asthma']) && $_POST['treat']['asthma'] != '')
          $_SESSION['treat']['asthma'] = $_POST['treat']['asthma'];
          else
          $_SESSION['treat']['asthma'] = '';
      
          if(isset($_POST['allergy']) && $_POST['allergy'] != '')
          $_SESSION['allergy'] = $_POST['allergy'];
          else
          $_SESSION['allergy'] = '';

         }else{
            ?>
            データ取得を失敗しました。お手数ですがお電話の程よろしくお願いいたします。<br/>
            </div>
            <hr/>
            </body>
            </html>
            <?php
            exit;
        }

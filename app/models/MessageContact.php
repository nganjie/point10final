<?php
  
   namespace App\Models;
   use App\Controllers\Securisation;
   use DateTime;
   use App\Models\SingleMessageContact;
use Database\DBConnection;

   class MessageContact extends Model{
    protected $table='message_contact';
    public $messages;
    public function create($post):bool
    {
      $date = new DateTime();
      $secu =new Securisation();
      $name= $secu->securiser($post['name']);
      $number =$secu->securiser($post['number']);
      $email=$secu->securiser($post['email']);
      $message =$secu->securiser($post['message']);
      $pdo =$this->getDB()->getPDO();
      $req =$pdo->prepare("INSERT INTO message_contact(nom,numero,email,content,date) VALUES(:nom,:numero,:email,:content,:date)");
      $r= $req->execute(array(
        "nom"=>$name,
        "numero"=>$number,
        "email"=>$email,
        "content"=>$message,
        "date"=>$date->format("Y-m-d H:i:s")
      ));
      //echo $r;
      return true;
    }
    static function nbMessage(){
      $db=new DBConnection();
      $pdo=$db->getPDO();
     $req =$pdo->prepare("SELECT COUNT(id) as nb FROM message_contact");
     $req->execute();
   $data=$req->fetch();
   return  $data->nb;
   }
    public function allMessageContact(){
      $pdo =$this->db->getPDO();
      $req =$pdo->prepare("SELECT * FROM message_contact ORDER BY id desc");
      $req->execute();
      $data=$req->fetchAll();
      //var_dump($data);
      foreach($data as $tab)
      {
        $this->messages[]=$tab;
      }
      //echo "un monde de malade part ici";
      //var_dump($data);
      //var_dump($this->messages);
    }
    public function Template()
    {
      $tab="<thead class='responsive-table__head'>
      <tr class='responsive-table__row table_msg'>
        <th
          class='responsive-table__head__title responsive-table__head__title--types'
        >
          Email
        </th>

        <th
          class='responsive-table__head__title responsive-table__head__title--update'
        >
          Messages
        </th>
        <th
          class='responsive-table__head__title responsive-table__head__title--update'
        >
          Date
        </th>

        <th
          class='responsive-table__head__title responsive-table__head__title--update'
        >
          Status
        </th>

        <th
          class='responsive-table__head__title responsive-table__head__title--status'
        >
          Action
        </th>
      </tr>
    </thead>";
    $tab .="<tbody class='responsive-table__body'>";
    //var_dump($this->messages);
    /*<td
        class='responsive-table__body__text responsive-table__body__text--types'
      >
        $ms->nom
      </td>
      <td
        class='responsive-table__body__text responsive-table__body__text--types'
      >
        $ms->numero
      </td>*/
    foreach($this->messages as $ms)
    {
      $msg=$ms->content;
      if(strlen($ms->content)>100)
      {
        $msg=substr($ms->content,0,100)."....";
      }
      //$date=new DateTime($ms->date);
      //echo $date->format('Y-m-d H');
      $tab.="<tr class='responsive-table__row table_msg'>
      
      <td
        class='responsive-table__body__text responsive-table__body__text--types'
      >
        $ms->email
      </td>
      <td
        class='responsive-table__body__text responsive-table__body__text--update'
      >
        $msg
      </td>

      <td
        class='responsive-table__body__text responsive-table__body__text--country'
      >
        $ms->date
      </td>
      <td
        class='responsive-table__body__text responsive-table__body__text--status'
      >
        <span class='status-indicator status-indicator--new'></span>
        <span> New </span>
      </td>
      <td
        class='responsive-table__body__text responsive-table__body__text--country action_section'
      >
        <button type='button' class='open-modal' data-open='modalvue$ms->id'>
          <svg
            xmlns='http://www.w3.org/2000/svg'
            height='1em'
            viewBox='0 0 576 512'
          >
            <path
              d='M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z'
            />
          </svg>
        </button>
      </td>
    </tr>";
    }
    $tab.="</tbody>";
    $tab .="<tbody class='responsive-table__body'>
    ";
    //$tab .="</table>";
    return $tab;
    }
   }
 ?>
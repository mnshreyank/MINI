//alert("connected");
//Student login check yet from back-end...
// function checkCredentials(){
//     let sUsn=document.querySelector("#s_usn").value;
//     let sName=document.querySelector("#s_name").value;
//     console.log(sUsn);
//     console.log(sName);

//     if(!sUsn||!sName){
//         alert("Enter details");
//     }
//     else if(sUsn=="1bi16is049"&&sName=="Shreyank"){
//         event.preventDefault();
//         window.location="find-result.php";

//         //alert("correct")
//     }
//     else {
//         alert("Enter valid details");
        
//     }
// }
//Go to admin page of admin buttomn click
function alogin(){
    event.preventDefault();
    window.location="admin.php";
}
//go to home on button click

function goHome(){
    event.preventDefault();
    window.location="index.php";
}
function textPress(id1){
    event.preventDefault();
    document.getElementById(id1).style.borderColor="lightblue";
}
// var textEle=document.querySelector(".form_control");
// textEle.addEventListener('mouseover',function(){
//     event.preventDefault();
//     textEle.style.borderColor="blue";
// })
function normal(id1){
    event.preventDefault();
    
    document.getElementById(id1).style.borderColor="white";
}


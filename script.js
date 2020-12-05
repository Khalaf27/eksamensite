
/*
let knap = document.querySelector("#knap");

console.log(knap);

knap.addEventListener("click", ()=>{
    alert("Du har klippet på knappen");
} )
document.addEventListener("keyup", (e)=>{
      console.log(e);
})
*/
function playlose(){

    let gameSound = new Audio('sound/Game Over Demon Voice.mp3');
    gameSound.play();


}



function gameOver() {

    let tid = mins / 60 + secs;
    let score = 0

    console.log(tid)

    if (tid > 100) {
        
        score = 20
        
    }

    else if (tid > 75) {

        score = 15
        
    }
      else if (tid > 50) {

        score = 10
        
    }
      else if (tid > 25) {

        score = 5
        
    }
      else if (tid < 5) {

        score = 0
       
    }
    console.log(score)
    document.querySelector("#score1").value= score;
    document.querySelector(".navnform").style.display="block";
}













// TID 
        var mins = 2; 
        var secs = mins * 60; 
        function countdown() { 
            setTimeout('Decrement()', 60);
             
        } 
  
        function Decrement() { 
            if (document.querySelector) { 
                minutes = document.querySelector("#minutes"); 
                seconds = document.querySelector("#seconds");  
                if (seconds < 59) { 
                    seconds.value = secs; 
                } 
                else { 
                    minutes.value = getminutes(); 
                    seconds.value = getseconds(); 
                } 
               
                if (mins < 0.30) { 
                    minutes.style.color = "red"; 
                    seconds.style.color = "red"; 
                } 
                
                if (mins < 0) { 
                    playlose()
                    alert('Game over !'); 
                    location.reload()
                    minutes.value = 0; 
                    seconds.value = 0; 
                   
                } 
                else { 
                    secs--; 
                    setTimeout('Decrement()', 1000); 
                } 
            } 
        } 
  
        function getminutes() { 
            mins = Math.floor(secs / 60); 
            return mins; 
        } 
  
        function getseconds() { 
            return secs - Math.round(mins * 60); 
        } 

// LIV
let health = document.querySelector("#health")
 function healthxx() {
     if (player === trap){
         health.value -= 10; 
     }
 }

 // LYD
let audio = new Audio('sound/Negev Desert Loop.wav');
audio.pause();
let  = document.querySelector("#replay");

console.log(replay); 

replay.addEventListener("click", ()=>{
    location.reload(); 
})

let canvas = document.querySelector("#canvas"); 
let ctx = canvas.getContext('2d'); 

let player = new Image(); 
player.src= 'img/strongguy2.png';

maze =
[
    [0,0,0,0,0,2,2,2,2,2],
    [0,2,2,2,2,2,0,5,0,4],
    [0,0,2,0,6,0,6,0,6,0],
    [5,2,2,2,2,2,2,2,2,0],   
    [0,0,0,0,5,0,0,2,2,7],
    [0,2,2,2,2,2,2,2,2,0],
    [0,2,7,0,0,5,0,5,0,0],
    [0,2,0,6,0,6,0,6,0,0],
    [3,2,2,2,2,2,2,2,1,0],
    [0,0,0,0,0,0,0,0,0,0]

]

let wall = 0

kasse = new Image(); 
kasse.src= 'img/box.png';

let road = 2;
sand = new Image(); 
sand.src= 'img/sand.png';


let trap = 3
bot1 = new Image(); 
bot1.src= 'img/gunman2.png';

let trap2 = 5
bot2 = new Image(); 
bot2.src= 'img/survivor-meleeattack_knife_5.png';


let trap3 = 6
bot3 = new Image(); 
bot3.src= 'img/survivor-meleeattack_knife_11.png';

let trap4 = 7
bot4 = new Image(); 
bot4.src= 'img/survivor-meleeattack_knife_0.png';

let finish = 4
girl = new Image(); 
girl.src= 'img/girl1.png';


const ninjaMovementChar3Arr = [{y:8, x:0},{y:8, x:1},{y:8, x:2}];
const enemyPosition = {x:0, y:0};
let counter = 0;


setInterval(()=>{
    ninjaMovementChar3();
    
},1000)

function ninjaMovementChar3(){

    

    
    maze[ninjaMovementChar3Arr[counter].y][ninjaMovementChar3Arr[counter].x] = 3;
    maze[enemyPosition.y][enemyPosition.x] = 2;
 
   drawMaze();

   
    

   if(counter === 2){
       counter = 0;
   }else{
    counter++;
   }

}


/*
const ninjaMovementChar4Arr = [{y:4, x:0},{y:4, x:1},{y:4, x:2}];
const enemyPosition2 = {x:0, y:0}

let counter = 0;

setInterval(()=>{
    ninjaMovementChar3();
    
},1000)

function ninjaMovementChar3(){

    console.log(ninjaMovementChar3Arr[counter]);

    
    maze[ninjaMovementChar3Arr[counter].y][ninjaMovementChar3Arr[counter].x] = 3;
    maze[enemyPosition2.y][enemyPosition2.x] = 2;

   drawMaze();

   console.log(maze);
    

   if(counter === 2){
       counter = 0;
   }else{
    counter++;
   }

}



*/



// Sounds
function walk(){

    let gameSound = new Audio('sound/stepstone_1.wav');
    gameSound.play();

}

 
function playsound(){

    let gameSound = new Audio('/sound/background-game-melody-loop.mp3');
    gameSound.pause();

}

function playgirl(){

    let gameSound = new Audio('sound/weirdwarriornosieslol.mp3');
    gameSound.pause();

}
function playhit(){

    let gameSound = new Audio('sound/hit.mp3');
    gameSound.pause();

}



let tileSize = 50;

let playerPosition = {x:0, y:0};
ctx.drawImage(player,9*tileSize,9*tileSize,tileSize,tileSize);


function drawMaze(){
    if (health.value == 0) {
        playlose()
         alert('Game over !'); 
        location.reload()
    }
    else {
        for(let y= 0; y < maze.length; y++){

        for(let x = 0; x < maze[y].length; x++){

        if(maze[y][x] === 0){
            ctx.drawImage(kasse,x*tileSize,y*tileSize,tileSize,tileSize);
        }else if(maze[y][x] === 2){
             ctx.drawImage(sand,x*tileSize,y*tileSize,tileSize,tileSize);
        }else if(maze[y][x] === 1){
            playerPosition.x = x; 
            playerPosition.y = y; 
         ctx.drawImage(player,x*tileSize,y*tileSize,tileSize,tileSize);
        }else if(maze[y][x] === 3){   
            enemyPosition.x = x; 
            enemyPosition.y = y; 
            ctx.drawImage(bot1,x*tileSize,y*tileSize,tileSize,tileSize);
          }else if(maze[y][x] === 5){
         ctx.drawImage(bot2,x*tileSize,y*tileSize,tileSize,tileSize);
          }else if(maze[y][x] === 6){
         ctx.drawImage(bot3,x*tileSize,y*tileSize,tileSize,tileSize);
          }else if(maze[y][x] === 7){
         ctx.drawImage(bot4,x*tileSize,y*tileSize,tileSize,tileSize);
        }else if(maze[y][x] === 4){
            ctx.drawImage(girl,x*tileSize,y*tileSize,tileSize,tileSize);
        }
      }
    }
    }

  

}

drawMaze();

window.addEventListener("keydown", (e)=>{
  
    switch(e.keyCode){
        case 37: // Left
    
        if (maze[playerPosition.y] [playerPosition.x -1] === 2){ // Spørg om der er vej på venstre tile for playeren
            maze[playerPosition.y] [playerPosition.x -1] = 1 // Players nye position
            maze[playerPosition.y] [playerPosition.x ] = 2 // Players gamle postion
            
            drawMaze();
            walk();
            audio.pause();
            
           
         
    } 
    else if (maze[playerPosition.y ] [playerPosition.x -1 ] === 3){
            alert ("Jeg fik dig! haha")
            health.value -= 25;
            playhit();
            audio.pause()
        }
        else if (maze[playerPosition.y ] [playerPosition.x +1 ] === 3){
            alert ("Jeg fik dig! haha");
            health.value -= 25; 
            playhit();
            audio.pause()
        }
        break;
        case 39: // Right
    
        if (maze[playerPosition.y] [playerPosition.x +1] === 2){ // Spørg om der er vej på venstre tile for playeren
            maze[playerPosition.y] [playerPosition.x +1] = 1 // Players nye position
            maze[playerPosition.y] [playerPosition.x ] = 2 // Players gamle postion
            drawMaze();
            walk()
        }
        
        else if (maze[playerPosition.y ] [playerPosition.x +1 ] === 3){
            alert ("Jeg fik dig! haha");
            health.value -= 25; 
            playhit();
            audio.pause()
        }

        else if (maze[playerPosition.y -1] [playerPosition.x ] === 5){
            alert ("Jeg fik dig! haha")
            health.value -= 25; 
            playhit();
            audio.pause()
        } 
        else if (maze[playerPosition.y -1] [playerPosition.x ] === 6){
            alert ("Jeg fik dig! haha")
            health.value -= 25; 
            playhit();
            audio.pause()
        }
        

        // Endgame
        
        
     
        break;

        case 40: // Down
    
        if (maze[playerPosition.y +1] [playerPosition.x ] === 2){ // Spørg om der er vej på venstre tile for playeren
            maze[playerPosition.y +1] [playerPosition.x ] = 1 // Players nye position
            maze[playerPosition.y] [playerPosition.x ] = 2 // Players gamle postion
            drawMaze();
            walk()
        }
         else if (maze[playerPosition.y +1 ] [playerPosition.x  ] === 4){
            gameOver()
            //alert ("Tillyke du har vundet!");
            //playgirl ();
            //audio.pause()
            
        }

        else if (maze[playerPosition.y +1] [playerPosition.x ] === 3){
            alert ("Jeg fik dig! haha")
            health.value -= 25; 
            playhit();
            audio.pause()
        }
        else if (maze[playerPosition.y -1] [playerPosition.x ] === 5){
            alert ("Jeg fik dig! haha")
            health.value -= 25; 
            playhit();
            audio.pause()
        } 
        else if (maze[playerPosition.y -1] [playerPosition.x ] === 6){
            alert ("Jeg fik dig! haha")
            health.value -= 25; 
            playhit();
            audio.pause()
        } 


    
        break;
        case 38: // Up
    
        if (maze[playerPosition.y -1] [playerPosition.x ] === 2){ // Spørg om der er vej på venstre tile for playeren
            maze[playerPosition.y -1] [playerPosition.x ] = 1 // Players nye position
            maze[playerPosition.y] [playerPosition.x ] = 2 // Players gamle postion
            drawMaze();
            walk();
        }   
        else if (maze[playerPosition.y -1] [playerPosition.x ] === 3){
            alert ("Jeg fik dig! haha")
            health.value -= 25; 
            playhit();
            audio.pause()
        } 
        else if (maze[playerPosition.y -1] [playerPosition.x ] === 5){
            alert ("Jeg fik dig! haha")
            health.value -= 25; 
            playhit();
            audio.pause()
        } 
        else if (maze[playerPosition.y -1] [playerPosition.x ] === 6){
            alert ("Jeg fik dig! haha")
            health.value -= 25; 
            playhit();
            audio.pause()
        } 
    } 
} )


window.addEventListener("load", drawMaze);


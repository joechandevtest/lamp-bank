

function startTime() {
    const today = new Date();
    let h = today.getHours();
    let m = today.getMinutes();
    let s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    
    let year = today.getFullYear();
    let month = today.getMonth()+1;
    let day = today.getDate();
    
    document.getElementById('time').innerHTML =  year+"/"+month+"/"+ day+ " Time Now is " +  h + ":" + m + ":" + s;
    setTimeout(startTime, 1000);
  }

function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

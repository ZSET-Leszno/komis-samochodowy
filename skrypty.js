let x=0;
window.onscroll = function() {scrollFunction()};
       function scrollFunction() {
       //tu możesz zmieniać po ilu pikselach ma się odliczać
       if (document.body.scrollTop > 380 || document.documentElement.scrollTop > 380 && x==0) {liczby(); x=1;}}
function liczby(){
    let valueDisplays = document.querySelectorAll(".num");
    let interval = 2000;

    valueDisplays.forEach((valueDisplay) => {
        let startValue = 0;
        let endValue = parseInt(valueDisplay.getAttribute("data-val"));
        let duration = Math.floor(interval / endValue);
        let counter = setInterval(function () {
            startValue += 1;
            valueDisplay.textContent = startValue;
            if(startValue == endValue){
                clearInterval(counter)
            }
        }, duration);
    });
};
window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
        //tu możesz zmieniać po ilu pikselach ma się odliczać
        if (document.body.scrollTop == 200 || document.documentElement.scrollTop == 200) {liczby();}}
function liczby(){
    let valueDisplays = document.querySelectorAll(".num");
    let interval = 3000;

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
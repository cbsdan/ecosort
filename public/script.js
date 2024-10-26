$(function() {
    let initialOffset = {};
    let lives = 5;
    let properlySegregated = 0;

    const heartLogoArray = $('img.heart-logo').toArray();
    const checkLogoArray = $('img.correct-logo').toArray();

    $(".draggable").draggable({
        start: function(event, ui) {
            initialOffset = $(this).offset();
            $(this).css({background: "transparent"});
        },
        revert: function(droppable) {
            return !droppable; 
        },
        stop: function(event, ui) {
            setTimeout(() => {
                $(this).css({background: "rgb(67, 67, 67)"});
            }, 500); 
        }
    });

    $(".droppable").droppable({
        drop: function(event, ui) {
            const draggableType = ui.draggable.attr('class').split(' ')[1]; 
            const droppableType = $(this).attr('class').split(' ')[1]; 
            
            if (draggableType === droppableType) {
                console.log("Dropped in the correct trash can!");

                ui.draggable.offset({
                    bottom: "20%", 
                    left: "50%"
                });

                ui.draggable.find(".check-logo").removeClass("hidden");
                ui.draggable.draggable("disable");

                ui.draggable.find(".item").addClass("hidden");
                
                // Delay setting display to none
                setTimeout(() => {
                    ui.draggable.css({ display: "none" });
                }, 500); // Set to 500 milliseconds, which is 0.5 seconds.
            
                properlySegregated++;
                updateCheckLogos(properlySegregated);
                if (properlySegregated === Number($("#trashItemsCount").text())) {
                    $("#congratulations").removeClass("hidden");
                }

            } else {
                ui.draggable.find('.incorrect-logo').removeClass('hidden')
                setTimeout(function() {
                    ui.draggable.find('.incorrect-logo').addClass('hidden')

                    const parentOffset = $(ui.draggable).parent().offset();
                    const returnTop = initialOffset.top - parentOffset.top;
                    const returnLeft = initialOffset.left;
                    
                    $(ui.draggable).animate({
                        top: returnTop,
                        left: returnLeft
                    }, 500, function() {
                        $(ui.draggable).css({ top: '', left: '' });
                    });
                    
                    lives--;
                    updateHeartOpacity(lives);

                    if (lives <= 0) {
                        $("#gameOver").removeClass("hidden")
                    }
                }, 500)
            }
        }
    });

    $('#gameDifficulty button').on('click', function() {
        $("#gameDifficulty").addClass("hidden");

        const difficulty = $(this).data('difficulty');
    
        $.ajax({
            url: 'request/set_difficulty.php', 
            method: 'POST',
            data: { difficulty: difficulty },
            success: function(response) {
                console.log('Difficulty set to:', difficulty);
            },
            error: function() {
                console.log('Error setting difficulty');
            }
        });

        setTimeout(()=>{
            window.location.href = "game.php";
        }, 100)
    });
    
    $("#retryGame").click(()=>{
        setTimeout(()=>{
            window.location.href = "game.php";
        }, 100)
    })
    $("#tryAgain").click(()=>{
        setTimeout(()=>{
            window.location.href = "game.php";
        }, 100)
    })

    function updateHeartOpacity(lives) {
        heartLogoArray.forEach((heart, index) => {
            if (index < lives) {
                $(heart).removeClass('opacity-3');
            } else {
                $(heart).addClass('opacity-3'); 
            }
        });
    }

    function updateCheckLogos(properlySegregated) {
        checkLogoArray.forEach((logo, index) => {
            if (index < properlySegregated) {
                $(logo).removeClass('opacity-3'); 
            } else {
                $(logo).addClass('opacity-3'); 
            }
        });
    }
});

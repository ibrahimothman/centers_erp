

$.notify.addStyle('successful-process', {
    html: `<div>
                            <span data-notify-text/>
                            <i class="fas fa-times-circle"
                            style="
                                    color:white;
                                    opacity:0.7;
                                    position: relative;
                                    top: 0px;
                                    left: -28px;
                                  "
                            ></i>
                        </div>`,
    classes: {
        base: {
            "white-space": "nowrap",
            "background-color": "green",
            "padding": "15px",
            "padding-left": "35px",
            "border-radius": "3px"
        },
        done: {
            "color": "white",
            "background-color": "#28a745",
            "font-weight":"bold"
        },
        notDone:{
            "color": "white",
            "background-color": "#dc3545",
            "font-weight":"bold"
        }
    }
});






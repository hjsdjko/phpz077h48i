const menu = {
    list() {
        if(localStorage.getItem("menus")) {
            return eval('(' + localStorage.getItem("menus")+ ')');
        } else {
            return [];
        }
    }
}
export default menu;

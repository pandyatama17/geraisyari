<style media="screen">
.vert-move {
  -webkit-animation: animate 1s infinite  alternate;
  animation: animate 1s infinite  alternate;
}
.vert-move {
  -webkit-animation: animate 1s infinite  alternate;
  animation: animate 1s infinite  alternate;
}
@-webkit-keyframes animate {
  0% { transform: translateY(0); }
  100% { transform: translateY(-10px); }
}
@keyframes animate {
  0% { transform: translateY(0); }
  100% { transform: translateY(-10px); }
}

.pageLoader
{
    position: absolute;
    top: 0;
    left: 0; /*make it stay on the grid*/
    height: 100%; /*cover grid area*/
    z-index: 999;
    width: 100%;
    display:table;
    background: rgba(0, 0, 0, 0.5);
    transition: all 0.5s;
}
.pageLoader i {
   display:table-cell;
    vertical-align:middle;
    text-align:center;
}
.custom-chk
{
  border-radius: 4px;
  background-color: #52a7e0;
  color:white;
  transition: .5s;
}
.custom-chk:hover
{
  background-color: #3498db;
}
.custom-chk.active
{
  background-color: #2283c3;
}
.phone::-webkit-inner-spin-button, 
.phone::-webkit-outer-spin-button { 
  -webkit-appearance: none;
  margin: 0;
}
</style>

import Chart from "../node_modules/chart.js/auto/auto.esm.js";


    let cn=document.getElementById("cn");
   let products=[];
   let sellsnum=[];
    $.post(
        "./Includes/getData.php",
        (data)=>{
            let list=JSON.parse(data);
            Object.entries(list).forEach(([key,value])=>{
                products.push(key);
               sellsnum.push(parseInt(value));
            })
            console.log(products)
            let c=new Chart(cn,
        {
            type:'bar' ,
            data:{labels:products,
                datasets:[{data:sellsnum}]
            },options:{
                responsive:false,
                plugins:{ 
                    title:{
                        display:true,
                        text:"total sales foreach product"
                    },legend:{
                        display:false
                    }
                }
            }
        }
    );

        })
  
   


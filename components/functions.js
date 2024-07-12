
  
  function ToastAlert(alertClass,message,delay){
  let body=document.querySelector('body'),alertDiv=document.createElement('div')
  
    alertDiv.textContent=message
  
    alertDiv.classList.add(alertClass)
  
    body.appendChild(alertDiv)
  
    setTimeout(()=>{
  
      body.removeChild(alertDiv)
  
    },delay)
  
    
  
      }
  
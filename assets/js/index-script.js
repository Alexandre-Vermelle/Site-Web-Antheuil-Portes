
//titleStyle

function init () {

    wait(1000).then(() => {
      clearText()
      typeText('Site internet d\'Antheuil-Portes : \n').then(typeLoop)
    })
    
    function typeLoop() {
      typeText('Petit village de 400 habitants')
        .then(() => wait(2000))
        .then(() => removeText('Petit village de 400 habitants'))
        .then(() => typeText('Près de Compiègne dans l\'Oise (60)'))
        .then(() => wait(2000))
        .then(() => removeText('Situé à proximité de Compiègne dans l\'Oise (60)'))
        .then(() => typeText('Communauté de Communes du Pays des Sources'))
        .then(() => wait(2000))
        .then(() => removeText('Communauté de Communes du Pays des Sources'))
        .then(typeLoop)
    }
    
  }
  
  
  // Source code 🚩
  
  const elementNode = document.getElementById('type-text')
  let text = ''
  
  function updateNode () {
    elementNode.innerText = text
  }
  
  function pushCharacter (character) {
    text += character
    updateNode()
  }
  
  function popCharacter () {
    text = text.slice(0, text.length -1)
    updateNode()
  }
  
  function clearText () {
    text = ''
    updateNode()
  }
  
  
  function wait (time) {
    if (time === undefined) {
      const randomMsInterval = 100 * Math.random()
      time = randomMsInterval < 50 ? 10 : randomMsInterval
    }
    
    return new Promise(resolve => {
      setTimeout(() => {
        requestAnimationFrame(resolve)
      }, time)
    })
  }
  
  function typeCharacter (character) {
    return new Promise(resolve => {
      pushCharacter(character)
      wait().then(resolve)
    })
  }
  
  function removeCharacter () {
    return new Promise(resolve => {
      popCharacter()
      wait().then(resolve)
    })
  }
  
  function typeText (text) {
    return new Promise(resolve => {
      
      function type ([ character, ...text ]) {
        typeCharacter(character)
          .then(() => {
            if (text.length) type(text)
            else resolve()
          })
      }
      
      type(text)
    })
  }
  
  function removeText ({ length:amount }) {
    return new Promise(resolve => {
      
      function remove (count) {
        removeCharacter()
          .then(() => {
            if (count > 1) remove(count - 1)
            else resolve()
          })
      }
      
      remove(amount)
    })
  }
  
  
  init()

  //titleStyle
  
  
  
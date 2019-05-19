function vote(id) {
  return fetch('vote.php', {
    'method': 'POST',
    'headers': {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    'body': `id=${id}`
  }).then(resp => resp.json());
}

window.addEventListener('load', () => {
  let voted = false;
  const candidates = document.getElementById('candidates');
  const info = document.getElementById('info');

  function log(message) {
    info.classList.remove('error');
    info.classList.add('log');
    info.textContent = 'Log: ' + message;
  }

  function error(message) {
    info.classList.add('error');
    info.classList.remove('log');
    info.textContent = 'Error: ' + message;
  }

  for (const candidate of candidates.children) {
    candidate.addEventListener('click', () => {
      const id = candidate.dataset.id;

      if (voted) {
        error('You can vote only once :(');
        return false;
      }

      vote(id).then(data => {
        if ('error' in data) {
          throw new Error(data['error'])
        }

        log(data['message']);
        candidate.classList.add('voted');
        voted = true;
      }).catch(data => {
        error(data.message);
      });
    }, false);
  }
}, false);
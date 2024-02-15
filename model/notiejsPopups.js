import notie from 'notie';

notie.alert({
    type: 'info', // optional, default = 4, enum: [1, 2, 3, 4, 5, 'success', 'warning', 'error', 'info', 'neutral']
    text: 'TESTING',
    stay: true, // optional, default = false
  })
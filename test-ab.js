var frontityInjectorAbTesting = 'alternative';
if (window.localStorage) {
  var previousTest = window.localStorage.getItem(
    'frontity-injector-ab-testing-1'
  );
  if (previousTest) {
    frontityInjectorAbTesting = previousTest;
  } else {
    var isFrontity = Math.random() * 100 <= 10;
    if (isFrontity) {
      window.localStorage.setItem('frontity-injector-ab-testing-1', 'frontity');
      frontityInjectorAbTesting = 'frontity';
    } else {
      window.localStorage.setItem(
        'frontity-injector-ab-testing-1',
        'alternative'
      );
    }
  }
}

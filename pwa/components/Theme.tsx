import { createMuiTheme } from '@material-ui/core/styles';
import blue from '@material-ui/core/colors/blue';
import yellow from '@material-ui/core/colors/yellow';

const theme = createMuiTheme({
    palette: {
      primary: yellow,
      secondary: blue,
      type: 'dark', // Switching the dark mode on is a single property value change.
    },
  });


export default theme
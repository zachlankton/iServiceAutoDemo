import * as React from 'react';
import { AppBar } from 'react-admin';
import Typography from '@material-ui/core/Typography';
import { makeStyles } from '@material-ui/core/styles';
import Image from "next/image"

const useStyles = makeStyles({
    title: {
        flex: 1,
        textOverflow: 'ellipsis',
        whiteSpace: 'nowrap',
        overflow: 'hidden',
    },
    spacer: {
        flex: 1,
    },
});

const _AppBar = props => {
    const classes = useStyles();
    return (
        <AppBar {...props}>
            <Typography
                variant="h6"
                color="inherit"
                className={classes.title}
                id="react-admin-title"
            />
            <Image src="/iService-logo.png" alt="" width="128" height="35"/>
            <h6 style={{marginLeft: "20px", marginTop: "5px"}} >Demo</h6>
            <span className={classes.spacer} />
        </AppBar>
    );
};

export default _AppBar;
import moment from 'moment';

export default function fromNow (time) {
  return moment(time, 'X').fromNow();
}

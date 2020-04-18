import { mount } from '@vue/test-utils';
import Filters from "../../js/components/filters/Filters";

describe('Filters Component', () => {
  test('should mount without crashing', () => {
    const wrapper = mount(Filters);
    expect(wrapper).toMatchSnapshot();
  })
});

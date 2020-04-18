import { mount } from '@vue/test-utils'
import BoolInput from '../../js/components/filters/BoolInput.vue'

test('should mount without crashing', () => {
  const wrapper = mount(BoolInput);

  expect(wrapper).toMatchSnapshot()
});

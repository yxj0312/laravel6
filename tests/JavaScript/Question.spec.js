import { mount } from '@vue/test-utils';
import expect from 'expect';
import Question from '../../resources/js/components/Question.vue';

describe ('Question', () => {
   let wrapper;

    beforeEach(()=> {
        wrapper = mount(Question, {
            propsData: {
                question: {
                    title:'The title',
                    body: 'The body'
                }
            }
        });
    });

    it('presents the title and the body', ()=> {
        expect(wrapper.html()).toContain('The title');
        expect(wrapper.html()).toContain('The body');
    });
});